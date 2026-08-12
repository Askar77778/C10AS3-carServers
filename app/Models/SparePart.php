<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SparePart extends Model 
{
    protected $fillable = ['category_id', 'name_tm', 'name_ru', 'name_en', 'price', 'stock'];

    public function category() {
        return $this->belongsTo(Category::class);
    }
}