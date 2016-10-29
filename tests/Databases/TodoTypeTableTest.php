<?php


class TodoTypeTableTest extends TestCase
{
    /**
     * To-doタイプテーブルにデフォルトデータがある.
     *
     * @test
     */
    public function testTodoTypeTableHasDefault()
    {
        $this->seeInDatabase('todo_types', [
            'id' => \App\Definer::PUBLIC_TODO,
            'name' => 'type.public',
            'color_id' => \App\Definer::SUCCESS_COLOR_ID,
        ]);

        $this->seeInDatabase('todo_types', [
            'id' => \App\Definer::PRIVATE_TODO,
            'name' => 'type.private',
            'color_id' => \App\Definer::WARNING_COLOR_ID,
        ]);
    }
}
