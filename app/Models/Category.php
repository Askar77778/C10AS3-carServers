<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model 
{
    protected $fillable = ['name', 'name_tm', 'name_ru'];

    public function spareParts() {
        return $this->hasMany(SparePart::class);
    }
}