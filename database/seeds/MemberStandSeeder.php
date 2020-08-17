<?php

use Illuminate\Database\Seeder;

class MemberStandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\MemberStand::class,100)->create();
    }
}
