<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vehicle;
use App\Models\User;

class VehicleSeeder extends Seeder {
    public function run(): void {
        $client = User::where('phone', '+99361998877')->where('role', 'client')->first();

        Vehicle::create([
            'user_id' => $client->id,
            'brand' => 'Toyota',
            'model' => 'Camry SE',
            'year' => 2021,
            'license_plate' => 'BF 91 69 BN',
        ]);
    }
}