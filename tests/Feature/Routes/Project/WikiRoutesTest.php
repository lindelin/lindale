<?php

namespace Tests\Feature\Routes\Project;

use App\User;
use App\Wiki\Wiki;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;
use App\Project\Project;

class WikiRoutesTest extends TestCase
{
    /**
     * ユーザモデル.
     *
     * @var
     */
    private $user;

    /**
     * プロジェクトモデル（非参与）.
     *
     * @var
     */
    private $project1;

    /**
     * プロジェクトモデル（参与）.
     *
     * @var
     */
    private $project2;

    private $wiki;

    /**
     * テストデータ作成.
     *
     * @return void
     */
    public function setUp()
    {
        Event::fake();
        parent::setUp();
        $this->user = factory(User::class)->create();
        $this->project1 = factory(Project::class)->create();
        $this->project2 = factory(Project::class)->create([
            'title' => 'UserTestProject',
            'user_id' => $this->user->id,
        ]);
        $this->wiki = factory(Wiki::class)->create([
            'title' => 'UserTestWiki',
            'user_id' => $this->user->id,
            'project_id' => $this->project2->id,
        ]);
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_access_the_my_project_wiki_page()
    {
        $response = $this->actingAs($this->user)->call('GET', '/project/'.$this->project2->id.'/wiki');
        $response->assertStatus(200);
        $response->assertViewHasAll(['selected', 'project', 'wikis', 'HomeWiki', 'types', 'DefaultType']);
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_access_the_my_project_first_wiki_page()
    {
        $response = $this->actingAs($this->user)->call('POST', '/project/'.$this->project2->id.'/wiki/first');
        $response->assertStatus(302);
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_access_the_my_project_create_wiki_page()
    {
        $this->actingAs($this->user)->call('POST', '/project/'.$this->project2->id.'/wiki/first');

        $response = $this->actingAs($this->user)->call('GET', '/project/'.$this->project2->id.'/wiki/create');
        $response->assertStatus(200);
        $response->assertViewHasAll(['selected', 'project', 'wikis', 'HomeWiki', 'types', 'DefaultType']);
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_access_the_my_project_show_wiki_page()
    {
        $this->actingAs($this->user)->call('POST', '/project/'.$this->project2->id.'/wiki/first');

        $response = $this->actingAs($this->user)->call('GET', '/project/'.$this->project2->id.'/wiki/'.$this->wiki->id);
        $response->assertStatus(200);
        $response->assertViewHasAll(['selected', 'project', 'wikis', 'HomeWiki', 'types', 'DefaultType', 'wiki']);
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_post_the_my_project_wiki()
    {
        $data = [
            'title' => 'TEST',
            'content' => 'TEST',
            'type_id' => 1,
        ];
        $response = $this->actingAs($this->user)->post('/project/'.$this->project2->id.'/wiki',
            array_merge($data, ['_token' => csrf_token()]));
        $this->assertDatabaseHas('wikis', $data);
        $response->assertStatus(302);
        $response->assertSessionHas('status');
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_access_the_my_project_edit_wiki_page()
    {
        $this->actingAs($this->user)->call('POST', '/project/'.$this->project2->id.'/wiki/first');

        $response = $this->actingAs($this->user)->call('GET', '/project/'.$this->project2->id.'/wiki/'.$this->wiki->id.'/edit');
        $response->assertStatus(200);
        $response->assertViewHasAll(['selected', 'project', 'wikis', 'HomeWiki', 'types', 'DefaultType', 'wiki']);
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_patch_the_my_project_wiki()
    {
        $data = [
            'title' => 'TEST_EDIT',
            'content' => 'TEST_EDIT',
            'type_id' => 1,
        ];
        $response = $this->actingAs($this->user)->patch('/project/'.$this->project2->id.'/wiki/'.$this->wiki->id,
            array_merge($data, ['_token' => csrf_token()]));
        $this->assertDatabaseHas('wikis', $data);
        $response->assertStatus(302);
        $response->assertSessionHas('status');
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_delete_the_my_project_wiki()
    {
        $this->actingAs($this->user)->call('POST', '/project/'.$this->project2->id.'/wiki/first');

        $response = $this->actingAs($this->user)->delete('/project/'.$this->project2->id.'/wiki/'.$this->wiki->id);
        $response->assertStatus(302);
        $response->assertSessionHas('status');
    }
}
