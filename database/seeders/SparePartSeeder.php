<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\SparePart;
use Illuminate\Database\Seeder;

class SparePartSeeder extends Seeder
{
    public function run(): void
    {
        $cat1 = Category::first();
        $cat2 = Category::skip(1)->first();

        $spareParts = [
            [
                'category_id' => $cat1?->id,
                'name' => 'Oil Filter (Toyota)',
                'name_tm' => 'Motor ýag süzgüçi (Toyota)',
                'name_ru' => 'Масляный фильтр (Toyota)',
                'price' => 120.00,
                'stock' => 25,
            ],
            [
                'category_id' => $cat2?->id,
                'name' => 'Car Battery 75Ah',
                'name_tm' => 'Akkumulyator 75Ah',
                'name_ru' => 'Аккумулятор 75Ah',
                'price' => 850.00,
                'stock' => 10,
            ],
        ];

        foreach ($spareParts as $part) {
            if ($part['category_id']) {
                SparePart::create([
                    'category_id' => $part['category_id'],
                    'name' => $part['name'],
                    'name_tm' => $part['name_tm'],
                    'name_ru' => $part['name_ru'],
                    'price' => $part['price'],
                    'stock' => $part['stock'],
                ]);
            }
        }
    }
}