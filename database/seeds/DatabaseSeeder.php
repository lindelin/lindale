<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//         $this->call(UserSeeder::class);
//         $this->call(ArticleSeeder::class);
        $this->call(TaskTypeSeeder::class);
        $this->call(TaskStatusSeeder::class);
        $this->call(TaskSeeder::class);
    }
}
