<?php

use Illuminate\Database\Seeder;

class TodoStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('todo_statuses')->delete();
        \App\Todo\TodoStatus::create([
            'id' => \App\Definer::DEFAULT_STATUS_ID,
            'name' => 'status.wait',
            'color_id' => \App\Definer::DEFAULT_COLOR_ID,
            'action_id' => \App\Definer::DEFAULT_STATUS_ID,
            'user_id' => \App\Definer::SUPER_ADMIN_ID,
        ]);
        \App\Todo\TodoStatus::create([
            'id' => \App\Definer::FINISH_STATUS_ID,
            'name' => 'status.finish',
            'color_id' => \App\Definer::SUCCESS_COLOR_ID,
            'action_id' => \App\Definer::FINISH_STATUS_ID,
            'user_id' => \App\Definer::SUPER_ADMIN_ID,
        ]);
        \App\Todo\TodoStatus::create([
            'id' => \App\Definer::UNDERWAY_STATUS_ID,
            'name' => 'status.underway',
            'color_id' => \App\Definer::PRIMARY_COLOR_ID,
            'action_id' => \App\Definer::UNDERWAY_STATUS_ID,
            'user_id' => \App\Definer::SUPER_ADMIN_ID,
        ]);
    }
}
