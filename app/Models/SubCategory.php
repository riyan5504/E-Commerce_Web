<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    public function Category()
    {
        return $this->belongsTo(Category::class, 'cat_id', 'id');
    }
    public function product()
    {
        return $this->hasMany(Product::class, 'sub_cat_id', 'id');
    }
}
