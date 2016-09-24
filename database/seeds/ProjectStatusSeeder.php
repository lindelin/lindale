<?php

use Illuminate\Database\Seeder;

class ProjectStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project_statuses')->delete();
        \App\Project\ProjectStatus::create([
            'id' => 1,
            'name' => 'New',
        ]);
    }
}
