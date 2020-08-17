<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\MemberStand;
use Faker\Generator as Faker;

$factory->define(MemberStand::class, function (Faker $faker) {
    return [
        'member_id'=>$faker->numberBetween(1,3000),
        'stand_id'=>$faker->numberBetween(1,3000),
    ];
});
