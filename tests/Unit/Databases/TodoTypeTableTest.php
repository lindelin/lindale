<?php

namespace Tests\Unit\Databases;

use Tests\TestCase;
use Definer;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

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
            'id' => Definer::PUBLIC_TODO,
            'name' => 'type.public',
            'color_id' => Definer::SUCCESS_COLOR_ID,
        ]);

        $this->assertDatabaseHas('todo_types', [
            'id' => Definer::PRIVATE_TODO,
            'name' => 'type.private',
            'color_id' => Definer::WARNING_COLOR_ID,
        ]);
    }
}
