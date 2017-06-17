<?php

namespace Tests\Feature\Routes;

use App\User;
use Tests\TestCase;
use App\Project\Project;

class ProjectRoutesTest extends TestCase
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

    /**
     * テストデータ作成.
     *
     * @before
     * @return void
     */
    public function createTestData()
    {
        $this->user = factory(User::class)->create();
        $this->project1 = factory(Project::class)->create();
        $this->project2 = factory(Project::class)->create([
            'title' => 'UserTestProject',
            'user_id' => $this->user->id,
        ]);
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_access_the_project_show_page()
    {
        $response = $this->actingAs($this->user)->get('/project');
        $response->assertStatus(200);
        $response->assertViewHasAll(['projects']);
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_not_access_the_project_show_page()
    {
        $response = $this->actingAs($this->user)->get('/project/'.$this->project1->id);
        $response->assertStatus(302);
        $response->assertRedirect('/');
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
        $response = $this->actingAs($this->user)->get('/project/'.$this->project1->id.'/info');
        $response->assertSessionHasErrors();
    }

    /**
     * プライベートルートとしてアクセスできる
     * 参与していないプロジェクトのため、リダイレクトされる.
     *
     * @test
     */
    public function it_can_access_the_project_show_progress_page()
    {
        $response = $this->actingAs($this->user)->get('/project/'.$this->project1->id.'/progress');
        $response->assertSessionHasErrors();
    }

    /**
     * プライベートルートとしてアクセスできる
     * 参与していないプロジェクトのため、リダイレクトされる.
     *
     * @test
     */
    public function it_can_access_the_project_show_task_page()
    {
        $response = $this->actingAs($this->user)->get('/project/'.$this->project1->id.'/task');
        $response->assertSessionHasErrors();
    }

    /**
     * プライベートルートとしてアクセスできる
     * 参与していないプロジェクトのため、リダイレクトされる.
     *
     * @test
     */
    public function it_can_access_the_project_show_todo_page()
    {
        $response = $this->actingAs($this->user)->get('/project/'.$this->project1->id.'/todo');
        $response->assertSessionHasErrors();
    }

    /**
     * プライベートルートとしてアクセスできる
     * 参与していないプロジェクトのため、リダイレクトされる.
     *
     * @test
     */
    public function it_can_access_the_project_show_member_page()
    {
        $response = $this->actingAs($this->user)->get('/project/'.$this->project1->id.'/member');
        $response->assertSessionHasErrors();
    }

    /**
     * プライベートルートとしてアクセスできる
     * 参与していないプロジェクトのため、リダイレクトされる.
     *
     * @test
     */
    public function it_can_access_the_project_show_wiki_page()
    {
        $response = $this->actingAs($this->user)->get('/project/'.$this->project1->id.'/wiki');
        $response->assertSessionHasErrors();
    }

    /**
     * プライベートルートとしてアクセスできる
     * 参与していないプロジェクトのため、リダイレクトされる.
     *
     * @test
     */
    public function it_can_access_the_project_show_config_page()
    {
        $response = $this->actingAs($this->user)->get('/project/'.$this->project1->id.'/config');
        $response->assertSessionHasErrors();
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
        $response->assertStatus(200);
        $response->assertViewHasAll(['projectActivity', 'selected', 'project']);
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_access_the_my_project_edit_page()
    {
        $response = $this->actingAs($this->user)->call('GET', '/project/'.$this->project2->id.'/edit');
        $response->assertStatus(200);
        $response->assertViewHasAll(['project', 'users']);
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_access_the_my_project_show_info_page()
    {
        $response = $this->actingAs($this->user)->call('GET', '/project/'.$this->project2->id.'/info');
        $response->assertStatus(200);
        $response->assertViewHasAll(['selected', 'project', 'pl', 'sl', 'pms', 'pmCount', 'allCount', 'slCount', 'users', 'paCount']);
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_access_the_my_project_show_progress_page()
    {
        $response = $this->actingAs($this->user)->call('GET', '/project/'.$this->project2->id.'/progress');
        $response->assertStatus(200);
        $response->assertViewHasAll([
            'selected',
            'project',
            'schemaDonut',
            'projectProgressPie',
            'taskProgressPie',
            'todoProgressPie',
            'projectProgressAreaspline', ]);
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_access_the_my_project_show_task_page()
    {
        $response = $this->actingAs($this->user)->call('GET', '/project/'.$this->project2->id.'/task');
        $response->assertStatus(200);
        $response->assertViewHasAll([
            'types',
            'statuses',
            'priorities',
            'taskGroupStatuses',
            'groups',
            'openGroups',
            'project',
            'selected',
            'mode',
            'in', ]);
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_access_the_my_project_show_todo_page()
    {
        $response = $this->actingAs($this->user)->call('GET', '/project/'.$this->project2->id.'/todo');
        $response->assertStatus(200);
        $response->assertViewHasAll(['selected', 'project', 'todos', 'lists', 'statuses', 'pl', 'sl', 'pms']);
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_access_the_my_project_show_member_page()
    {
        $response = $this->actingAs($this->user)->call('GET', '/project/'.$this->project2->id.'/member');
        $response->assertStatus(200);
        $response->assertViewHasAll(['selected', 'project', 'pl', 'sl', 'pms', 'pmCount', 'allCount', 'slCount', 'users', 'paCount']);
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_access_the_my_project_show_wiki_page()
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
    public function it_can_access_the_my_project_show_config_page()
    {
        $response = $this->actingAs($this->user)->call('GET', '/project/'.$this->project2->id.'/config');
        $response->assertStatus(200);
        $response->assertViewHasAll(['selected', 'project', 'mode', 'users']);
    }
}
