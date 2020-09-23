<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'email' => $faker->companyEmail,
        'password' => Hash::make('password'),
        'station_id' => $faker->numberBetween(1, 20),
    ];
});
