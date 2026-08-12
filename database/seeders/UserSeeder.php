<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder {
    public function run(): void {
        User::create([
            'name' => 'Askar Hudayberdiyew (Admin)',
            'password' => Hash::make('askar1713'),
            'role' => 'admin',
            'phone' => '+99361033268',
        ]);

        User::create([
            'name' => 'Meredow Artyk',
            'password' => Hash::make('artyk1234'),
            'role' => 'client',
            'phone' => '+99361998877',
        ]);

        User::create([
            'name' => 'Ussa Aman',
            'password' => Hash::make('aman1234'),
            'role' => 'mechanic',
            'phone' => '+99364123456',
        ]);        User::create([
            'name' => 'Aman',
            'password' => Hash::make('aman1234'),
            'role' => 'mechanic',
            'phone' => '+99361234567',
        ]);

        User::create([
            'name' => 'Ussa Babamyrat',
            'password' => Hash::make('baba1234'),
            'role' => 'mechanic',
            'phone' => '+99363987654',
        ]);
    }
}