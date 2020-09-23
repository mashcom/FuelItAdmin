<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            StationSeeder::class,
            UserSeeder::class,
            ProductSeeder::class,
            AvailabilitySeeder::class,
        ]);
    }
}
