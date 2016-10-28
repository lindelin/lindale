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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Project\Project::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->name,
        'password' => bcrypt('123456'),
        'user_id' => 1,
        'type_id' => 1,
    ];
});

$factory->define(App\Todo\TodoList::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->name,
        'type_id' => 1,
    ];
});

$factory->define(App\Wiki\Wiki::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->name,
        'user_id' => 1,
        'project_id' => 1,
    ];
});