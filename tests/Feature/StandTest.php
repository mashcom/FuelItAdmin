<?php

namespace Tests\Feature;

use App\Stand;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use Tests\TestCase;

class StandTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testStandListing()
    {
        $stand = factory(Stand::class)->createMany(90);


    }
}
