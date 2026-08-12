<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Engine Services',
                'name_tm' => 'Motor Hyzmatlary',
                'name_ru' => 'Услуги двигателя',
            ],
            [
                'name' => 'Electrical System',
                'name_tm' => 'Elektrik Hyzmatlary',
                'name_ru' => 'Электрика',
            ],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'name_tm' => $category['name_tm'],
                'name_ru' => $category['name_ru'],
            ]);
        }
    }
}