<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Mechanic;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{
    public function run(): void
    {
        $client = User::where('phone', '+99361998877')->where('role', 'client')->first();
        $vehicle = $client ? Vehicle::where('user_id', $client->id)->first() : null;
        $mechanic = Mechanic::first();

        if ($client && $vehicle && $mechanic) {
            $appointments = [
                [
                    'user_id' => $client->id,
                    'vehicle_id' => $vehicle->id,
                    'mechanic_id' => $mechanic->id,
                    'appointment_date' => '2026-08-20',
                    'appointment_time' => '10:00:00',
                    'status' => 'Garaşylýar',
                ],
            ];

            foreach ($appointments as $appointment) {
                Appointment::create([
                    'user_id' => $appointment['user_id'],
                    'vehicle_id' => $appointment['vehicle_id'],
                    'mechanic_id' => $appointment['mechanic_id'],
                    'appointment_date' => $appointment['appointment_date'],
                    'appointment_time' => $appointment['appointment_time'],
                    'status' => $appointment['status'],
                ]);
            }
        }
    }
}