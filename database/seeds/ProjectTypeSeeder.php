<?php

use Illuminate\Database\Seeder;

class ProjectTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project_types')->delete();
        \App\Project\ProjectType::create([
            'id' => 1,
            'name' => '家族計画',
        ]);
    }
}
