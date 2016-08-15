<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        \App\User::create([
            'id' => 1,
            'name'   => 'Admin',
            'email'    => 'admin@lindale.tk',
            'password' => bcrypt('lindale.tk'),
        ]);
    }
}
