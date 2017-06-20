<?php

namespace Tests\Feature\Databases;

use Definer;
use Tests\TestCase;

class TodoTypeTableTest extends TestCase
{
    /**
     * To-doタイプテーブルにデフォルトデータがある.
     *
     * @test
     */
    public function testTodoTypeTableHasDefault()
    {
        $this->assertDatabaseHas('todo_types', [
            'id' => config('todo.public'),
            'name' => 'type.public',
            'color_id' => Definer::SUCCESS_COLOR_ID,
        ]);

        $this->assertDatabaseHas('todo_types', [
            'id' => config('todo.private'),
            'name' => 'type.private',
            'color_id' => Definer::WARNING_COLOR_ID,
        ]);
    }
}
