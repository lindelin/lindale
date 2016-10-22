<?php

use Illuminate\Database\Seeder;

class TodoTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('todo_types')->delete();
        \App\Todo\TodoType::create([
            'id' => \App\Definer::PUBLIC_TODO,
            'name' => 'type.public',
            'color_id' => \App\Definer::SUCCESS_COLOR_ID,
        ]);
        \App\Todo\TodoType::create([
            'id' => \App\Definer::PRIVATE_TODO,
            'name' => 'type.private',
            'color_id' => \App\Definer::WARNING_COLOR_ID,
        ]);
    }
}
