<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Payment;
use Faker\Generator as Faker;

$factory->define(Payment::class, function (Faker $faker) {
    return [
        'transaction_date'=>$faker->dateTime,
        'reference'=>$faker->bankAccountNumber,
        'amount'=>$faker->numberBetween(30,10000),
        'source'=>'paypal',
        'description'=>$faker->sentence,
        'member_id'=>$faker->numberBetween(600,2000),
        'company_id'=>$faker->numberBetween(1,5),
        'allocation_id'=>$faker->numberBetween(1,45000),
        'status'=>$faker->numberBetween(1,3),
        'log_data'=>$faker->userAgent
    ];
});
