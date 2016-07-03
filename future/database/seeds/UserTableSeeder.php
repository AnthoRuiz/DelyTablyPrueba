<?php

use henfayer\Content;
use henfayer\User;
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
        Content::truncate();

        factory(henfayer\User::class)->create([
            'name'     => 'jakaboy',
            'email'    => 'yobakaj@gmail.com',
            'password' => bcrypt('a19525295'),
        ]);

        //factory(henfayer\User::class, 19)->create();

        factory(henfayer\User::class, 19)->create()->each(function ($user, $category) {
            $content = factory(henfayer\Content::class)->make();
            $user->contents()->save($content);
        });

    }
}

