<?php

use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu')->insert([
            'menu_name' => 'default',
            'menu_type' => 'default',
            'menu_link' => '#',
        ]);
    }
}
