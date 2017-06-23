<?php

namespace Tests\Feature\Databases;

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
            'id' => config('todo.status.default'),
            'name' => 'status.wait',
            'color_id' => config('color.default'),
            'action_id' => config('todo.status.default'),
            'user_id' => config('admin.super_admin.id'),
        ]);

        $this->assertDatabaseHas('todo_statuses', [
            'id' => config('todo.status.finished'),
            'name' => 'status.finish',
            'color_id' => config('color.success'),
            'action_id' => config('todo.status.finished'),
            'user_id' => config('admin.super_admin.id'),
        ]);

        $this->assertDatabaseHas('todo_statuses', [
            'id' => config('todo.status.underway'),
            'name' => 'status.underway',
            'color_id' => config('color.primary'),
            'action_id' => config('todo.status.underway'),
            'user_id' => config('admin.super_admin.id'),
        ]);

        $this->assertDatabaseHas('todo_statuses', [
            'id' => config('todo.status.undetermined'),
            'name' => 'status.undetermined',
            'color_id' => config('color.danger'),
            'action_id' => config('todo.status.undetermined'),
            'user_id' => config('admin.super_admin.id'),
        ]);
    }
}
