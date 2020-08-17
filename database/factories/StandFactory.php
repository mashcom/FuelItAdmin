<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Stand;
use Faker\Generator as Faker;

$factory->define(Stand::class, function (Faker $faker) {
    return [
        'size'=>$faker->numberBetween(200,3000),
        'size_unit'=>'sqm',
        'stand_number'=>$faker->unique()->numberBetween(1,2147483647),
        'company_id'=>$faker->numberBetween(1,5),
        'location_id'=>$faker->numberBetween(1,9)
    ];
});
