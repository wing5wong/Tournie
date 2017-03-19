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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Tournament::class, function(Faker\Generator $faker){
    return [
            'title' => 'Tournie 2017',
            'description' => 'A Sample tournament',
            'venue' => 'Sample Venue',
            'starts_at' => Carbon::parse('March 14, 2017 9:00am'),
            'ends_at' =>  Carbon::parse('March 16, 2017 5:00pm'),
        ];
});
