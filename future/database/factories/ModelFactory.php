<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(future\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt('cosa'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(future\Content::class, function (Faker\Generator $faker) {
    return [
        'title'        => $faker->title,
        'description' => $faker->text(40),
        'publishing_date'       => $faker->dateTimeBetween(['-1 years'],['now']),
        'exp_date'       => $faker->dateTimeBetween(['-4 years'],['now']),
        'author'        => $faker->name,
    ];
});


$factory->define(future\Category::class, function (Faker\Generator $faker) {
    return [
        'name'        => $faker->name,
    ];
});