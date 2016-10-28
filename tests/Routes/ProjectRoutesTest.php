<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProjectRoutesTest extends TestCase
{
    /**
     * ユーザモデル.
     *
     * @var App\User
     */
    private $user;

    private $project1;

    private $project2;
    /**
     * テストユーザ作成.
     *
     * @before
     * @return void
     */
    public function createUser()
    {
        $this->user = factory(App\User::class)->create();
        $this->project1 = factory(App\Project\Project::class)->create();
        $this->project2 = factory(App\Project\Project::class)->create([
            'title' => 'UserTestProject',
            'user_id' => $this->user->id,
        ]);
    }

    /**
     * プライベートルートとしてアクセスできる
     *
     * @test
     */
    public function it_can_access_the_project_page()
    {
        $response = $this->actingAs($this->user)->call('GET', '/project');
        $this->assertEquals(200, $response->status());
        $this->assertViewHasAll(['projects']);
    }

    /*
    |--------------------------------------------------------------------------
    | 参与していないプロジェクトの Routes Test
    |--------------------------------------------------------------------------
    */

    /**
     * プライベートルートとしてアクセスできる
     *
     * @test
     */
    public function it_can_access_the_project_show_page()
    {
        $response = $this->actingAs($this->user)->call('GET', '/project/'.$this->project1->id);
        $this->assertEquals(200, $response->status());
        $this->assertViewHasAll(['selected', 'project']);
    }

    /**
     * プライベートルートとしてアクセスできる
     * 参与していないプロジェクトのため、リダイレクトされる
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
     * 参与していないプロジェクトのため、リダイレクトされる
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
     * 参与していないプロジェクトのため、リダイレクトされる
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
     * 参与していないプロジェクトのため、リダイレクトされる
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
     * プライベートルートとしてアクセスできる
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
     * プライベートルートとしてアクセスできる
     *
     * @test
     */
    public function it_can_access_the_my_project_edit_page()
    {
        $response = $this->actingAs($this->user)->call('GET', '/project/'.$this->project2->id.'/edit');
        $this->assertEquals(200, $response->status());
        $this->assertViewHasAll(['project', 'types', 'users', 'statuses']);
    }

    /**
     * プライベートルートとしてアクセスできる
     *
     * @test
     */
    public function it_can_access_the_my_project_show_info_page()
    {
        $response = $this->actingAs($this->user)->call('GET', '/project/'.$this->project2->id.'/info');
        $this->assertEquals(200, $response->status());
        $this->assertViewHasAll(['selected', 'project', 'pl', 'sl', 'pms', 'pmCount', 'allCount', 'slCount', 'users', 'paCount']);
    }
}
