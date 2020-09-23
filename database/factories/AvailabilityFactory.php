<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Availability;
use Faker\Generator as Faker;

$factory->define(Availability::class, function (Faker $faker) {
    return [
        "product_id"=>$faker->numberBetween(1,200),
        "available"=>$faker->randomElement(array(0,1))
    ];
});
