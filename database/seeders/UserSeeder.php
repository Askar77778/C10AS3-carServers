<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'admin',
                'phone' => '+99361033268',
                'role' => 'admin',
                'password' => Hash::make('admin'),
            ],
            [
                'name' => 'Artyk',
                'phone' => '+99361998877',
                'role' => 'client',
                'password' => Hash::make('artyk1234'),
            ],
            [
                'name' => 'Aman',
                'phone' => '+99361234567',
                'role' => 'mechanic',
                'password' => Hash::make('aman1234'),
            ],
            [
                'name' => 'Babamyrat',
                'phone' => '+99363987654',
                'role' => 'mechanic',
                'password' => Hash::make('baba1234'),
            ],
        ];

        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'phone' => $user['phone'],
                'role' => $user['role'],
                'password' => $user['password'],
            ]);
        }
    }
}