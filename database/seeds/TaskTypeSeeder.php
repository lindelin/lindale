<?php

use Illuminate\Database\Seeder;

class TaskTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('task_types')->delete();
        \App\Task\TaskType::create([
            'id' => 1,
            'name' => '年中行事',
        ]);
        \App\Task\TaskType::create([
            'id' => 2,
            'name' => '项目开发',
        ]);
        \App\Task\TaskType::create([
            'id' => 3,
            'name' => '创业',
        ]);
        \App\Task\TaskType::create([
            'id' => 4,
            'name' => '学习',
        ]);
        \App\Task\TaskType::create([
            'id' => 5,
            'name' => '调查',
        ]);
        \App\Task\TaskType::create([
            'id' => 6,
            'name' => '家事',
        ]);
        \App\Task\TaskType::create([
            'id' => 7,
            'name' => '健康',
        ]);
    }
}
