<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class PaymentTest extends DuskTestCase
{
    /**
     * A Dusk test 
     *
     * @return void
     */
    public function testPaymentInitialisation()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/payment')
                    ->type('national_id', '12-350201-Z-47')
                    ->screenshot('Initialise Payment step 1')
                    ->press('find_allocations')
                    ->assertSee('Select Stand')
                    ->check('#allocation-0')
                    ->type('amount',rand(5,1000))
                    ->screenshot('Initialise Payment step 2')
                    ->press('input[type="submit"]')
                    ->assertSee('Verify & Finalise Payment')
                    ->screenshot('Initialise Payment step 3');
        });
    }

    public function testPaymentInitialisationWithInvalidId()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/payment')
            ->type('national_id', '12-350201-Z-4789')
            ->press('find_allocations')
            ->assertSee('Member could not be found, please try again!')
             ->screenshot('Initialise Payment Member Not Found step 1');
        });
    }
}
