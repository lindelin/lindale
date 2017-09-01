<?php

namespace Tests\Feature\Databases;

use Tests\TestCase;

class TaskPriorityTableTest extends TestCase
{
    /**
     * To-doステータステーブルにデフォルトデータがある.
     *
     * @test
     */
    public function testTaskPriorityTableHasDefault()
    {
        $this->assertDatabaseHas('task_priorities', [
            'id' => 1,
            'name' => 'type.low',
        ]);

        $this->assertDatabaseHas('task_priorities', [
            'id' => 2,
            'name' => 'type.normal',
        ]);

        $this->assertDatabaseHas('task_priorities', [
            'id' => 3,
            'name' => 'type.high',
        ]);

        $this->assertDatabaseHas('task_priorities', [
            'id' => 4,
            'name' => 'type.urgent',
        ]);

        $this->assertDatabaseHas('task_priorities', [
            'id' => 5,
            'name' => 'type.today',
        ]);

        $this->assertDatabaseHas('task_priorities', [
            'id' => 6,
            'name' => 'type.now',
        ]);
    }
}
