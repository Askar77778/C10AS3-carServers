<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Appointment;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\Mechanic;

class AppointmentSeeder extends Seeder {
    public function run(): void {
        $client = User::where('phone', '+99361998877')->where('role', 'client')->first();
        $vehicle = Vehicle::where('user_id', $client->id)->first();
        $mechanic = Mechanic::first();

        Appointment::create([
            'user_id' => $client->id,
            'vehicle_id' => $vehicle->id,
            'mechanic_id' => $mechanic->id,
            'appointment_date' => '2026-08-20',
            'appointment_time' => '10:00:00',
            'status' => 'Garaşylýar',
        ]);
    }
}