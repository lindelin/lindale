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
            'id' => config('todo.public'),
            'name' => 'type.public',
            'color_id' => config('color.success'),
        ]);
        \App\Todo\TodoType::create([
            'id' => config('todo.private'),
            'name' => 'type.private',
            'color_id' => config('color.warning'),
        ]);
    }
}
