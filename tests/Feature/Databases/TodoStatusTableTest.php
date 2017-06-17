<?php

namespace Tests\Feature\Databases;

use Definer;
use Tests\TestCase;

class TodoStatusTableTest extends TestCase
{
    /**
     * To-doステータステーブルにデフォルトデータがある.
     *
     * @test
     */
    public function testTodoStatusTableHasDefault()
    {
        $this->assertDatabaseHas('todo_statuses', [
            'id' => Definer::DEFAULT_STATUS_ID,
            'name' => 'status.wait',
            'color_id' => Definer::DEFAULT_COLOR_ID,
            'action_id' => Definer::DEFAULT_STATUS_ID,
            'user_id' => Definer::SUPER_ADMIN_ID,
        ]);

        $this->assertDatabaseHas('todo_statuses', [
            'id' => Definer::FINISH_STATUS_ID,
            'name' => 'status.finish',
            'color_id' => Definer::SUCCESS_COLOR_ID,
            'action_id' => Definer::FINISH_STATUS_ID,
            'user_id' => Definer::SUPER_ADMIN_ID,
        ]);

        $this->assertDatabaseHas('todo_statuses', [
            'id' => Definer::UNDERWAY_STATUS_ID,
            'name' => 'status.underway',
            'color_id' => Definer::PRIMARY_COLOR_ID,
            'action_id' => Definer::UNDERWAY_STATUS_ID,
            'user_id' => Definer::SUPER_ADMIN_ID,
        ]);

        $this->assertDatabaseHas('todo_statuses', [
            'id' => Definer::UNDETERMINED_STATUS_ID,
            'name' => 'status.undetermined',
            'color_id' => Definer::DANGER_COLOR_ID,
            'action_id' => Definer::UNDETERMINED_STATUS_ID,
            'user_id' => Definer::SUPER_ADMIN_ID,
        ]);
    }
}
