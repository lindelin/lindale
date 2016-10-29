<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProjectTodoRoutesTest extends TestCase
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
     * プロジェクトリストモデル
     *
     * @var App\Todo\TodoList
     */
    private $list;

    /**
     * テストデータ作成.
     *
     * @before
     * @return void
     */
    public function createUser()
    {
        $this->user = factory(App\User::class)->create();
        $this->project = factory(App\Project\Project::class)->create([
            'title' => 'UserTestProject',
            'user_id' => $this->user->id,
        ]);
        $this->list = factory(App\Todo\TodoList::class)->create([
            'project_id' => $this->project->id,
        ]);
    }

    /**
     * プライベートルートとしてアクセスできる
     *
     * @test
     */
    public function it_can_access_the_my_project_show_todo_page()
    {
        $response = $this->actingAs($this->user)->call('GET', '/project/'.$this->project->id.'/todo');
        $this->assertEquals(200, $response->status());
        $this->assertViewHasAll(['selected', 'project', 'todos', 'lists', 'statuses', 'pl', 'sl', 'pms']);
    }

    /**
     * プライベートルートとしてアクセスできる
     *
     * @test
     */
    public function it_can_access_the_my_project_show_todo_status1_page()
    {
        $response = $this->actingAs($this->user)->call('GET', '/project/'.$this->project->id.'/todo/status/1');
        $this->assertEquals(200, $response->status());
        $this->assertViewHasAll(['selected', 'project', 'todos', 'lists', 'statuses', 'pl', 'sl', 'pms']);
    }

    /**
     * プライベートルートとしてアクセスできる
     *
     * @test
     */
    public function it_can_access_the_my_project_show_todo_status2_page()
    {
        $response = $this->actingAs($this->user)->call('GET', '/project/'.$this->project->id.'/todo/status/2');
        $this->assertEquals(200, $response->status());
        $this->assertViewHasAll(['selected', 'project', 'todos', 'lists', 'statuses', 'pl', 'sl', 'pms']);
    }

    /**
     * プライベートルートとしてアクセスできる
     *
     * @test
     */
    public function it_can_access_the_my_project_show_todo_status3_page()
    {
        $response = $this->actingAs($this->user)->call('GET', '/project/'.$this->project->id.'/todo/status/3');
        $this->assertEquals(200, $response->status());
        $this->assertViewHasAll(['selected', 'project', 'todos', 'lists', 'statuses', 'pl', 'sl', 'pms']);
    }

    /**
     * プライベートルートとしてアクセスできる
     *
     * @test
     */
    public function it_can_access_the_my_project_show_todo_list_page()
    {
        $response = $this->actingAs($this->user)->call('GET', '/project/'.$this->project->id.'/todo/list/show/'.$this->list->id);
        $this->assertEquals(200, $response->status());
        $this->assertViewHasAll(['selected', 'project', 'todos', 'lists', 'statuses', 'pl', 'sl', 'pms']);
    }
}
