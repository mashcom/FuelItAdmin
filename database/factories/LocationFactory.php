<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Location;
use Faker\Generator as Faker;

$factory->define(Location::class, function (Faker $faker) {
    return [
        'name'=>$faker->streetName,
        'company_id'=>$faker->numberBetween(1,5),
    ];
});
