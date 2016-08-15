<?php

use Illuminate\Database\Seeder;

class TaskStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('task_statuses')->delete();
        \App\Task\TaskStatus::create([
            'id' => 1,
            'name' => '新建',
        ]);
        \App\Task\TaskStatus::create([
            'id' => 2,
            'name' => '进行中',
        ]);
        \App\Task\TaskStatus::create([
            'id' => 3,
            'name' => '放置',
        ]);
        \App\Task\TaskStatus::create([
            'id' => 4,
            'name' => '等待',
        ]);
        \App\Task\TaskStatus::create([
            'id' => 5,
            'name' => '未解决',
        ]);
        \App\Task\TaskStatus::create([
            'id' => 6,
            'name' => '解决',
        ]);
        \App\Task\TaskStatus::create([
            'id' => 7,
            'name' => '完成',
        ]);
        \App\Task\TaskStatus::create([
            'id' => 8,
            'name' => '校验',
        ]);
        \App\Task\TaskStatus::create([
            'id' => 9,
            'name' => '终止',
        ]);
    }
}
