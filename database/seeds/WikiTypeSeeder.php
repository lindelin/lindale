<?php

use Illuminate\Database\Seeder;

class WikiTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('wiki_types')->delete();
        \App\Wiki\WikiType::create([
            "id" => "1",
            "name" => "wiki",
        ]);
    }
}
