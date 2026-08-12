<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder {
    public function run(): void {
        Category::create([
            'name' => 'Engine Services',
            'name_tm' => 'Motor Hyzmatlary',
            'name_ru' => 'Услуги двигателя',
            
        ]);

        Category::create([
            'name' => 'Electrical System',
            'name_tm' => 'Elektrik Hyzmatlary',
            'name_ru' => 'Электрика',
        ]);
    }
}