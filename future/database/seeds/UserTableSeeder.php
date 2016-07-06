<?php

use future\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        factory(future\User::class)->create([
            'name'     => 'jakaboy',
            'email'    => 'yobakaj@gmail.com',
            'password' => bcrypt('a19525295'),
        ]);

    }
}

