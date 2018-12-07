<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DriversSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('lt_LT');
        foreach (range(1, 50) as $index) {
            $date = $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now');
            DB::table('drivers')->insert([
                'created_at' => $date,
                'name'       => $faker->name,
                'city'       => $faker->city,
            ]);
        }
    }
}
