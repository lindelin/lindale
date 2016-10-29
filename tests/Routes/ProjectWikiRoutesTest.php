<?php


class ProjectWikiRoutesTest extends TestCase
{
    /**
     * ユーザモデル.
     *
     * @var App\User
     */
    private $user;

    /**
     * プロジェクトモデル（参与）.
     *
     * @var App\Project\Project
     */
    private $project;

    /**
     * Wikiモデル.
     *
     * @var App\Wiki\Wiki
     */
    private $wiki;

    /**
     * テストデータ作成.
     *
     * @before
     * @return void
     */
    public function createTestData()
    {
        $this->user = factory(App\User::class)->create();
        $this->project = factory(App\Project\Project::class)->create([
            'title' => 'UserTestProject',
            'user_id' => $this->user->id,
        ]);
        $this->wiki = factory(App\Wiki\Wiki::class)->create([
            'title' => 'UserTestWiki',
            'user_id' => $this->user->id,
            'project_id' => $this->project->id,
        ]);
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_access_the_my_project_show_wiki_page()
    {
        $response = $this->actingAs($this->user)->call('GET', '/project/'.$this->project->id.'/wiki');
        $this->assertEquals(200, $response->status());
        $this->assertViewHasAll(['selected', 'project', 'wikis', 'HomeWiki', 'types', 'DefaultType']);
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_access_the_my_project_wiki_create_page()
    {
        $response = $this->actingAs($this->user)->call('GET', '/project/'.$this->project->id.'/wiki/create');
        $this->assertEquals(200, $response->status());
        $this->assertViewHasAll(['selected', 'project', 'wikis', 'HomeWiki', 'types', 'DefaultType']);
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_access_the_my_project_wiki_edit_page()
    {
        $response = $this->actingAs($this->user)->call('GET', '/project/'.$this->project->id.'/wiki/'.$this->wiki->id.'/edit');
        $this->assertEquals(200, $response->status());
        $this->assertViewHasAll(['selected', 'project', 'wikis', 'HomeWiki', 'types', 'DefaultType']);
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_access_the_my_project_first_wiki_page()
    {
        $response = $this->actingAs($this->user)->call('GET', '/project/'.$this->project->id.'/wiki-index/create');
        $this->assertEquals(200, $response->status());
        $this->assertViewHasAll(['selected', 'project', 'wikis', 'HomeWiki', 'types', 'DefaultType']);
    }
}
