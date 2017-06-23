<?php

namespace Tests\Feature\Databases;

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
            'color_id' => config('color.success'),
        ]);

        $this->assertDatabaseHas('todo_types', [
            'id' => config('todo.private'),
            'name' => 'type.private',
            'color_id' => config('color.warning'),
        ]);
    }
}
