<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name'=>$faker->randomElement(array("Petrol","Diesel")),
        'station_id'=>$faker->numberBetween(1,50),
        'zwl_price'=>$faker->randomFloat(2,90,150),
        'usd_price'=>$faker->randomFloat(2,0.90,1.50),
    ];
});
