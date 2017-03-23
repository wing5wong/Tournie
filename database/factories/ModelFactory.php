<?php

use Carbon\Carbon;

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
            'starts_at' => Carbon::parse('+2 weeks'),
            'ends_at' =>  Carbon::parse('+2 weeks +2 days'),
        ];
});

$factory->define(App\Team::class, function(Faker\Generator $faker){
    return [
            'name'=>'Test Team',
            'division' => 'Test Division'
        ];
});
