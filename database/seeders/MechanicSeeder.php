<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mechanic;
use App\Models\User;

class MechanicSeeder extends Seeder {
    public function run(): void {
        $aman = User::where('name', 'Aman')->where('role', 'mechanic')->first();
        $babamurat = User::where('name', 'Ussa Babamyrat')->where('role', 'mechanic')->first();

        Mechanic::create([
            'user_id' => $aman->id,
            'specialization' => 'Awtoelektrik & Diagnostika',
            'monthly_schedule' => 'Duşenbe-Şenbe: 09:00 - 18:00',
            'is_available' => true,
        ]);

        Mechanic::create([
            'user_id' => $babamyrat->id,
            'specialization' => 'Motor & Hodowoý',
            'monthly_schedule' => 'Duşenbe-Anna: 08:00 - 17:00',
            'is_available' => true,
        ]);
    }
}