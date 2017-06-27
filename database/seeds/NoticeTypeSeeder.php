<?php

use Illuminate\Database\Seeder;

class NoticeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notice_types')->delete();
        \App\Notice\NoticeType::create([
            'id' => 1,
            'name' => 'type.normal',
            'color_id' => 3,
        ]);
        \App\Notice\NoticeType::create([
            'id' => 2,
            'name' => 'type.info',
            'color_id' => 4,
        ]);
        \App\Notice\NoticeType::create([
            'id' => 3,
            'name' => 'type.important',
            'color_id' => 5,
        ]);
        \App\Notice\NoticeType::create([
            'id' => 4,
            'name' => 'type.urgency',
            'color_id' => 6,
        ]);
    }
}
