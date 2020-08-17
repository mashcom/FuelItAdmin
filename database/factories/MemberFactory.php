<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Member;
use Faker\Generator as Faker;

$factory->define(Member::class, function (Faker $faker) {
    return [
        'firstname'=>$faker->firstName,
        'surname'=>$faker->lastName,
        'national_id'=>$faker->numberBetween(10,70)."-".$faker->numberBetween(200165,2001656)."-".$faker->randomLetter."-".$faker->numberBetween(10,50),
        'company_id'=>$faker->numberBetween(1,5)
    ];
});
