<?php

namespace Database\Seeders;

use App\Models\Mechanic;
use App\Models\User;
use Illuminate\Database\Seeder;

class MechanicSeeder extends Seeder
{
    public function run(): void
    {
        $aman = User::where('name', 'Aman')->where('role', 'mechanic')->first();
        $babamyrat = User::where('name', 'Ussa Babamyrat')->where('role', 'mechanic')->first();

        $mechanics = [
            [
                'user_id' => $aman?->id,
                'specialization' => 'Awtoelektrik & Diagnostika',
                'monthly_schedule' => 'Duşenbe-Şenbe: 09:00 - 18:00',
                'is_available' => true,
            ],
            [
                'user_id' => $babamyrat?->id,
                'specialization' => 'Motor & Hodowoý',
                'monthly_schedule' => 'Duşenbe-Anna: 08:00 - 17:00',
                'is_available' => true,
            ],
        ];

        foreach ($mechanics as $mechanic) {
            if ($mechanic['user_id']) {
                Mechanic::create([
                    'user_id' => $mechanic['user_id'],
                    'specialization' => $mechanic['specialization'],
                    'monthly_schedule' => $mechanic['monthly_schedule'],
                    'is_available' => $mechanic['is_available'],
                ]);
            }
        }
    }
}