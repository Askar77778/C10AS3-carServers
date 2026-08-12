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
                    'user_id' => $client->id,
                    'brand' => 'Toyota',
                    'model' => 'Camry SE',
                    'year' => 2021,
                    'license_plate' => 'BF 91 69 BN',
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