<?php

use Illuminate\Database\Seeder;

class StandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Stand::class, 3000)->create();

    }
}
