<?php

use App\Policies\TodoPolicy;

class TodoPolicyTest extends TestCase
{
    /**
     * ユーザモデル.
     *
     * @var App\User
     */
    private $user;

    /**
     * プロジェクトモデル.
     *
     * @var App\Project\Project
     */
    private $project;

    /**
     * To-doモデル.
     *
     * @var App\Todo\Todo
     */
    private $todo;

    /**
     * user's To-doモデル.
     *
     * @var App\Todo\Todo
     */
    private $userTodo;

    /**
     * project's To-doモデル.
     *
     * @var App\Todo\Todo
     */
    private $projectTodo;

    private $todoPolicy;

    /**
     * テストデータ作成.
     *
     * @before
     * @return void
     */
    public function createTestData()
    {
        $this->user = factory(App\User::class)->create();
        $this->project = factory(App\Project\Project::class)->create();
        $this->todo = factory(App\Todo\Todo::class)->create();
        $this->userTodo = factory(App\Todo\Todo::class)->create([
            'user_id' => $this->user->id,
        ]);
        $this->projectTodo = factory(App\Todo\Todo::class)->create([
            'project_id' => $this->project->id,
        ]);
        $this->todoPolicy = new TodoPolicy();
    }

    /**
     * To-do削除認可失敗.
     *
     * @test
     */
    public function testDeletePolicyFalse()
    {
        $result = $this->todoPolicy->delete($this->user, $this->todo, $this->project);
        $this->assertFalse($result);
    }

    /**
     * To-do削除認可成功（ユーザ所有の場合）.
     *
     * @test
     */
    public function testUserDeletePolicyTrue()
    {
        $result = $this->todoPolicy->delete($this->user, $this->userTodo, $this->project);
        $this->assertTrue($result);
    }

    /**
     * To-do削除認可成功（プロジェクト所有の場合）.
     *
     * @test
     */
    public function testProjectDeletePolicyTrue()
    {
        $result = $this->todoPolicy->delete($this->user, $this->userTodo, $this->project);
        $this->assertTrue($result);
    }

    /**
     * To-do更新認可失敗.
     *
     * @test
     */
    public function testUpdatePolicyFalse()
    {
        $result = $this->todoPolicy->update($this->user, $this->todo, $this->project);
        $this->assertFalse($result);
    }

    /**
     * To-do更新認可成功（ユーザ所有の場合）.
     *
     * @test
     */
    public function testUserUpdatePolicyTrue()
    {
        $result = $this->todoPolicy->update($this->user, $this->userTodo, $this->project);
        $this->assertTrue($result);
    }

    /**
     * To-do更新認可成功（プロジェクト所有の場合）.
     *
     * @test
     */
    public function testProjectUpdatePolicyTrue()
    {
        $result = $this->todoPolicy->update($this->user, $this->userTodo, $this->project);
        $this->assertTrue($result);
    }
}
