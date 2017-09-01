<?php

namespace Tests\Feature\Routes;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TaskRoutesTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * ユーザモデル.
     *
     * @var
     */
    private $user;

    /**
     * テストユーザ作成.
     *
     * @before
     * @return void
     */
    public function createTestData()
    {
        $this->user = factory(\App\User::class)->create();
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_access_the_task_page()
    {
        $response = $this->actingAs($this->user)->get('/task');
        $response->assertStatus(200);
        $response->assertViewHasAll(['tasks', 'priorities']);
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_access_the_unfinished_task_page()
    {
        $response = $this->actingAs($this->user)->get('/task/unfinished');
        $response->assertStatus(200);
        $response->assertViewHasAll(['tasks', 'priorities']);
    }

    /**
     * プライベートルートとしてアクセスできる.
     *
     * @test
     */
    public function it_can_access_the_finished_task_page()
    {
        $response = $this->actingAs($this->user)->get('/task/finished');
        $response->assertStatus(200);
        $response->assertViewHasAll(['tasks', 'priorities']);
    }
}
