<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded =[];
    protected $table = 'category';

    public function subCategory()
    {
        return $this->hasMany(SubCategory::class, 'cat_id', 'id');
    }
    public function product()
    {
        return $this->hasMany(Product::class, 'cat_id', 'id');
    }
}
