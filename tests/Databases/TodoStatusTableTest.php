<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TodoStatusTableTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * To-doステータステーブルにデフォルトデータがある.
     *
     * @test
     */
    public function testTodoStatusTableHasDefault()
    {
        $this->seeInDatabase('todo_statuses', [
            'id' => \App\Definer::DEFAULT_STATUS_ID,
            'name' => 'status.wait',
            'color_id' => \App\Definer::DEFAULT_COLOR_ID,
            'action_id' => \App\Definer::DEFAULT_STATUS_ID,
            'user_id' => \App\Definer::SUPER_ADMIN_ID,
        ]);

        $this->seeInDatabase('todo_statuses', [
            'id' => \App\Definer::FINISH_STATUS_ID,
            'name' => 'status.finish',
            'color_id' => \App\Definer::SUCCESS_COLOR_ID,
            'action_id' => \App\Definer::FINISH_STATUS_ID,
            'user_id' => \App\Definer::SUPER_ADMIN_ID,
        ]);

        $this->seeInDatabase('todo_statuses', [
            'id' => \App\Definer::UNDERWAY_STATUS_ID,
            'name' => 'status.underway',
            'color_id' => \App\Definer::PRIMARY_COLOR_ID,
            'action_id' => \App\Definer::UNDERWAY_STATUS_ID,
            'user_id' => \App\Definer::SUPER_ADMIN_ID,
        ]);
    }
}
