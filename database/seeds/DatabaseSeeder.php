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
        $this->call(DriversSeeder::class);
        $this->call(RadarsSeeder::class);
        $this->call(FuelStationsSeeder::class);
        $this->call(UsersSeeder::class);
    }
}
