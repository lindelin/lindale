<?php

use Illuminate\Database\Seeder;
use Event;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::fake();
        DB::table('users')->delete();
        \App\User::create([
            'id' => 1,
            'name'   => 'Admin',
            'email'    => 'admin@lindelin.org',
            'password' => bcrypt('123456'),
        ]);
        \App\User::create([
            'id' => 2,
            'name'   => 'TestUser1',
            'email'    => 'user1@lindelin.org',
            'password' => bcrypt('123456'),
        ]);
        \App\User::create([
            'id' => 3,
            'name'   => 'TestUser2',
            'email'    => 'user2@lindelin.org',
            'password' => bcrypt('123456'),
        ]);
    }
}
