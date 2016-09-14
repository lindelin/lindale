<?php

use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->delete();
        for ($i = 0; $i < 10; $i++) {
            \App\Project\Project::create([
                'title'   => 'title'.$i,
                'content' => 'content'.$i,
                'user_id' => 1,
                'type_id' => 1,
                'password'=> bcrypt('123456'),
            ]);
        }

    }
}
