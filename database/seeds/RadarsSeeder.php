<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RadarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker\Factory::create();
        foreach (range(1, 50) as $index) {
            $date = $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now');
            DB::table('radars')->insert([
                'created_at' => $date,
                'date'       => $date,
                'number'     => strtoupper($faker->bothify('???###')),
                'distance'   => $faker->numberBetween(400, 1200),
                'time'       => $faker->numberBetween(30, 90),
            ]);
        }
    }
}
