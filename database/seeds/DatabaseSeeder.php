<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CompanySeeder::class);
        $this->call(LocationSeeder::class);
        $this->call(MemberSeeder::class);
        $this->call(MemberStandSeeder::class);
        $this->call(StandSeeder::class);

    }
}
