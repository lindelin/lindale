<?php

use Illuminate\Database\Seeder;

class TaskPrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('task_priorities')->delete();
        \App\Task\TaskPriority::create([
            'id' => 1,
            'name' => 'type.low',
        ]);
        \App\Task\TaskPriority::create([
            'id' => 2,
            'name' => 'type.normal',
        ]);
        \App\Task\TaskPriority::create([
            'id' => 3,
            'name' => 'type.high',
        ]);
        \App\Task\TaskPriority::create([
            'id' => 4,
            'name' => 'type.urgent',
        ]);
        \App\Task\TaskPriority::create([
            'id' => 5,
            'name' => 'type.today',
        ]);
        \App\Task\TaskPriority::create([
            'id' => 6,
            'name' => 'type.now',
        ]);
    }
}
