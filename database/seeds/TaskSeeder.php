<?php

use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->delete();
        for ($i = 0; $i < 10; $i++) {
            \App\Task\Task::create([
                'name'   => 'name' . $i,
                'content'    => 'content' . $i,
                'user_id' => 1,
            ]);
        }
    }
}
