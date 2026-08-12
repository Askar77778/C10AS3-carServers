<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SparePart;
use App\Models\Category;

class SparePartSeeder extends Seeder {
    public function run(): void {
        $cat1 = Category::first();
        $cat2 = Category::skip(1)->first();

        SparePart::create([
            'category_id' => $cat1->id,
            'name_tm' => 'Motor ýag süzgüçi (Toyota)',
            'name_ru' => 'Масляный фильтр (Toyota)',
            'name_en' => 'Oil Filter (Toyota)',
            'price' => 120.00,
            'stock' => 25,
        ]);

        SparePart::create([
            'category_id' => $cat2->id,
            'name_tm' => 'Akkumulyator 75Ah',
            'name_ru' => 'Аккумулятор 75Ah',
            'name_en' => 'Car Battery 75Ah',
            'price' => 850.00,
            'stock' => 10,
        ]);
    }
}