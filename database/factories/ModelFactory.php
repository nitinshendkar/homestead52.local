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
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Author::class, function (Faker\Generator $faker) {
    return [
        'author_name' => $faker->name,
        'updated_at' => $faker->date(),
    ];
});



$factory->define(App\Book::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->word,
        'description' => str_random(10),
        'author_id' => random_int(\DB::table('authors')->min('id'), \DB::table('authors')->max('id')),
        'updated_at' => $faker->date(),
    ];
});
