<?php

namespace Tests\Feature\Routes;

use Event;
use App\User;
use App\Todo\Todo;
use Tests\TestCase;
use App\Todo\TodoType;
use App\Project\Project;
use App\Todo\TodoStatus;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TodoRoutesTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * モデル.
     *
     * @var
     */
    private $user;
    private $project;

    /**
     * テストユーザ作成.
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        Event::fake();
        $this->user = factory(User::class)->create();
        $this->project = factory(Project::class)->create([
            'user_id' => $this->user->id,
        ]);
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_access_the_todo_page()
    {
        $response = $this->actingAs($this->user)->get('/todo');
        $response->assertStatus(200);
        $response->assertViewHasAll(['todos', 'lists', 'statuses', 'MProjects', 'JProjects', 'prefix', 'type']);
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_post_public_todo()
    {
        $data = [
            'content' => 'TEST: TODO',
            'details' => 'TEST: TODO',
            'user_id' => $this->user->id,
            'color_id'=> 1,
            'type_id' => 1,
            'project_id' => $this->project->id,
        ];
        $response = $this->actingAs($this->user)->post('/todo', array_merge($data, ['_token' => csrf_token()]));
        $this->assertDatabaseHas('todos', $data);
        $response->assertStatus(302);
        $response->assertSessionHas('status');
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_post_private_todo()
    {
        $data = [
            'content' => 'TEST: TODO',
            'details' => 'TEST: TODO',
            'user_id' => $this->user->id,
            'color_id'=> 1,
            'type_id' => 2,
        ];
        $response = $this->actingAs($this->user)->post('/todo', array_merge($data, ['_token' => csrf_token()]));
        $this->assertDatabaseHas('todos', $data);
        $response->assertStatus(302);
        $response->assertSessionHas('status');
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_access_the_todo_status_page()
    {
        $todoStatus = TodoStatus::first();
        $response = $this->actingAs($this->user)->get('/todo/status/'.$todoStatus->id);
        $response->assertStatus(200);
        $response->assertViewHasAll(['todos', 'lists', 'statuses', 'MProjects', 'JProjects', 'prefix', 'type']);
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_patch_todo()
    {
        $data = [
            'content' => 'TEST: TODO',
            'details' => 'TEST: TODO',
        ];
        $todo = factory(Todo::class)->create([
            'user_id' => $this->user->id,
            ]);
        $response = $this->actingAs($this->user)->patch('/todo/todo/'.$todo->id, array_merge($data, ['_token' => csrf_token()]));
        $this->assertDatabaseHas('todos', $data);
        $response->assertStatus(302);
        $response->assertSessionHas('status');
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_delete_todo()
    {
        $todo = factory(Todo::class)->create([
            'user_id' => $this->user->id,
        ]);
        $response = $this->actingAs($this->user)->delete('/todo/todo/'.$todo->id);
        $response->assertStatus(302);
        $response->assertSessionHas('status');
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_access_the_public_todo_page()
    {
        $todoType = TodoType::find(config('todo.public'));
        $response = $this->actingAs($this->user)->get('/todo/type/'.$todoType->id);
        $response->assertStatus(200);
        $response->assertViewHasAll(['todos', 'lists', 'statuses', 'MProjects', 'JProjects', 'prefix', 'type']);
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_access_the_private_todo_page()
    {
        $todoType = TodoType::find(config('todo.private'));
        $response = $this->actingAs($this->user)->get('/todo/type/'.$todoType->id);
        $response->assertStatus(200);
        $response->assertViewHasAll(['todos', 'lists', 'statuses', 'MProjects', 'JProjects', 'prefix', 'type']);
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_access_the_public_status_todo_page()
    {
        $todoType = TodoType::find(config('todo.public'));
        $todoStatus = TodoStatus::first();
        $response = $this->actingAs($this->user)->get('/todo/type/'.$todoType->id.'/status/'.$todoStatus->id);
        $response->assertStatus(200);
        $response->assertViewHasAll(['todos', 'lists', 'statuses', 'MProjects', 'JProjects', 'prefix', 'type']);
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_access_the_private_status_todo_page()
    {
        $todoType = TodoType::find(config('todo.private'));
        $todoStatus = TodoStatus::first();
        $response = $this->actingAs($this->user)->get('/todo/type/'.$todoType->id.'/status/'.$todoStatus->id);
        $response->assertStatus(200);
        $response->assertViewHasAll(['todos', 'lists', 'statuses', 'MProjects', 'JProjects', 'prefix', 'type']);
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_access_the_public_project_todo_page()
    {
        $todoType = TodoType::find(config('todo.public'));
        $todoStatus = TodoStatus::first();
        $project = factory(Project::class)->create([
            'user_id' => $this->user->id,
        ]);
        $response = $this->actingAs($this->user)->get('/todo/type/'.$todoType->id.'/project/'.$project->id);
        $response->assertStatus(200);
        $response->assertViewHasAll(['todos', 'lists', 'statuses', 'MProjects', 'JProjects', 'prefix', 'type']);
    }
}
