<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Faker\Generator as Faker;
class PaymentTest extends DuskTestCase
{
    /**
     * A Dusk test
     *
     * @param $faker
     * @return void
     */
    public function testPaymentInitialisation(Faker $faker)
    {

        $this->browse(function (Browser $browser) use ($faker) {

            $browser->visit('/station/create')
                ->type('name', $faker->randomElement(array("Total","Zuva Petroleum","Puma","Redan","BP","COMOIL","Shell"))." ".$faker->streetName)
                ->type('city', $faker->randomElement(array("Gweru","Bulawayo","Harare","Mutare","Masvingo","Victoria Falls","Kwekwe","Kadoma","Bindura")))
                ->type('latitude', $faker->latitude)
                ->type('longitude', $faker->longitude)
                ->type('user', $faker->name)
                ->type('user_email', $faker->companyEmail)
                ->type('user_password', 'password')
                ->screenshot('Input before submitting')
                ->press('input[type="submit"]')
                ->assertSee('success')
                ->screenshot('Add station test');
        });
    }

}
