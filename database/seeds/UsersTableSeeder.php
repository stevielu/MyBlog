<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        \App\User::create([
            'name' => 'stevie',
            'email' => 'ruvei@qq.com',
            'password' => Hash::make('123456'),
        ]);
    }
}