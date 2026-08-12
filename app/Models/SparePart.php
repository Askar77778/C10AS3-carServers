<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SparePart extends Model 
{
    protected $fillable = ['category_id', 'name', 'name_tm', 'name_ru', 'price', 'stock'];

    public function category() {
        return $this->belongsTo(Category::class);
    }
}