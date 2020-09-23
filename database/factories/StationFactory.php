<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Station;
use Faker\Generator as Faker;

$factory->define(Station::class, function (Faker $faker) {
    return [
        'name'=>$faker->randomElement(array("Total","Zuva Petroleum","Puma","Redan","BP","COMOIL","Shell"))." ".$faker->streetName,// ." ".$faker->randomElements(array("1st Street","3rd Street","4th Street","Angwa Street","Leopold Takawira","Herbet Chitepo","RG Mugabe Way")),
        'city'=>$faker->randomElement(array("Gweru","Bulawayo","Harare","Mutare","Masvingo","Victoria Falls","Kwekwe","Kadoma","Bindura")),
        'latitude'=>$faker->latitude,
        'longitude'=>$faker->longitude,
    ];
});
