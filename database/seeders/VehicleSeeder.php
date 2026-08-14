<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    public function run(): void
    {
        $client = User::where('phone', '+99361998877')->first();

        if ($client) {
            $vehicles = [
                [   
                'user_id'       => $client->id,
                'brand'         => 'Toyota',
                'model'         => 'Camry SE',
                'year'          => 2021,
                'license_plate' => 'BF 91 69 BN',
                ],
                [
                'user_id'       => $client->id,
                'brand'         => 'Mercedes-Benz',
                'model'         => 'E 350',
                'year'          => 2019,
                'license_plate' => 'DZ 55 88 MR',
                ],
                [
                'user_id'       => $client->id,
                'brand'         => 'Lexus',
                'model'         => 'RX 350',
                'year'          => 2023,
                'license_plate' => 'BN 30 15 TR',
            
                ],
                [
                'user_id'       => $client->id,
                'brand'         => 'Nissan',
                'model'         => 'Rogue',
                'year'          => 2021,
                'license_plate' => 'BF 65 43 AH',
                ],
                [
                'user_id'       => $client->id,
                'brand'         => 'Ford',
                'model'         => 'Explorer',
                'year'          => 2022,
            'license_plate' => 'AG 50 50 BN',
            ],
            ];

            foreach ($vehicles as $vehicle) {
                Vehicle::create([
                    'user_id' => $vehicle['user_id'],
                    'brand' => $vehicle['brand'],
                    'model' => $vehicle['model'],
                    'year' => $vehicle['year'],
                    'license_plate' => $vehicle['license_plate'],
                ]);
            }
        }
    }
}