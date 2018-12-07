<?php

use Illuminate\Database\Seeder;

class FuelStationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            'Alauša',
            'Apoil',
            'Baltic',
            'Petroleum',
            'Cauda',
            'Ecoil',
            'Egas',
            'Emsi',
            'Jozita',
            'Kvistija',
            'Lukoil',
            'Luktarna',
            'Milda',
            'Neste',
            'Orlen',
            'Regusa',
            'Rotada',
            'Saurida',
            'Sensus',
            'Statoil',
            'Takuras',
            'Vakoil',
            'Videra',
        ];
        foreach ($names as $name) {
            DB::table('fuel_stations')->insert([
                'created_at' => \Carbon\Carbon::now(),
                'name'       => $name,
            ]);
        }
    }
}
