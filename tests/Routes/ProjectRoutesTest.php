<?php


class ProjectRoutesTest extends TestCase
{
    /**
     * ユーザモデル.
     *
     * @var App\User
     */
    private $user;

    /**
     * プロジェクトモデル（非参与）.
     *
     * @var App\User
     */
    private $project1;

    /**
     * プロジェクトモデル（参与）.
     *
     * @var App\User
     */
    private $project2;

    /**
     * テストデータ作成.
     *
     * @before
     * @return void
     */
    public function createTestData()
    {
        $this->user = factory(App\User::class)->create();
        $this->project1 = factory(App\Project\Project::class)->create();
        $this->project2 = factory(App\Project\Project::class)->create([
            'title' => 'UserTestProject',
            'user_id' => $this->user->id,
        ]);
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_not_access_the_project_page()
    {
        $response = $this->actingAs($this->user)->call('GET', '/project');
        $this->assertEquals(200, $response->status());
        $this->assertViewHasAll(['projects']);
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_access_the_project_show_page()
    {
        $response = $this->actingAs($this->user)->call('GET', '/project/'.$this->project1->id);
        $this->assertEquals(302, $response->status());
        $this->assertRedirectedTo('/');
    }

    /*
    |--------------------------------------------------------------------------
    | 参与していないプロジェクトの Routes Test
    |--------------------------------------------------------------------------
    */

    /**
     * プライベートルートとしてアクセスできる
     * 参与していないプロジェクトのため、リダイレクトされる.
     *
     * @test
     */
    public function it_can_access_the_project_show_info_page()
    {
        $this->actingAs($this->user)->call('GET', '/project/'.$this->project1->id.'/info');
        $this->assertSessionHasErrors();
    }

    /**
     * プライベートルートとしてアクセスできる
     * 参与していないプロジェクトのため、リダイレクトされる.
     *
     * @test
     */
    public function it_can_access_the_project_show_todo_page()
    {
        $this->actingAs($this->user)->call('GET', '/project/'.$this->project1->id.'/todo');
        $this->assertSessionHasErrors();
    }

    /**
     * プライベートルートとしてアクセスできる
     * 参与していないプロジェクトのため、リダイレクトされる.
     *
     * @test
     */
    public function it_can_access_the_project_show_member_page()
    {
        $this->actingAs($this->user)->call('GET', '/project/'.$this->project1->id.'/member');
        $this->assertSessionHasErrors();
    }

    /**
     * プライベートルートとしてアクセスできる
     * 参与していないプロジェクトのため、リダイレクトされる.
     *
     * @test
     */
    public function it_can_access_the_project_show_wiki_page()
    {
        $this->actingAs($this->user)->call('GET', '/project/'.$this->project1->id.'/wiki');
        $this->assertSessionHasErrors();
    }

    /*
    |--------------------------------------------------------------------------
    | 参与しているプロジェクトの Routes Test
    |--------------------------------------------------------------------------
    */

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_access_the_my_project_show_page()
    {
        $response = $this->actingAs($this->user)->call('GET', '/project/'.$this->project2->id);
        $this->assertEquals(200, $response->status());
        $this->assertViewHasAll(['selected', 'project']);
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_access_the_my_project_edit_page()
    {
        $response = $this->actingAs($this->user)->call('GET', '/project/'.$this->project2->id.'/edit');
        $this->assertEquals(200, $response->status());
        $this->assertViewHasAll(['project', 'users',]);
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_access_the_my_project_show_info_page()
    {
        $response = $this->actingAs($this->user)->call('GET', '/project/'.$this->project2->id.'/info');
        $this->assertEquals(200, $response->status());
        $this->assertViewHasAll(['selected', 'project', 'pl', 'sl', 'pms', 'pmCount', 'allCount', 'slCount', 'users', 'paCount']);
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_access_the_my_project_show_todo_page()
    {
        $response = $this->actingAs($this->user)->call('GET', '/project/'.$this->project2->id.'/todo');
        $this->assertEquals(200, $response->status());
        $this->assertViewHasAll(['selected', 'project', 'todos', 'lists', 'statuses', 'pl', 'sl', 'pms']);
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_access_the_my_project_show_member_page()
    {
        $response = $this->actingAs($this->user)->call('GET', '/project/'.$this->project2->id.'/member');
        $this->assertEquals(200, $response->status());
        $this->assertViewHasAll(['selected', 'project', 'pl', 'sl', 'pms', 'pmCount', 'allCount', 'slCount', 'users', 'paCount']);
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_access_the_my_project_show_wiki_page()
    {
        $response = $this->actingAs($this->user)->call('GET', '/project/'.$this->project2->id.'/wiki');
        $this->assertEquals(200, $response->status());
        $this->assertViewHasAll(['selected', 'project', 'wikis', 'HomeWiki', 'types', 'DefaultType']);
    }
}
