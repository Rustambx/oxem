<?php

namespace App\Modules\Product\Models;

use App\Modules\Category\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'price', 'quantity', 'external_id', 'categories'];

    public function categories ()
    {
        return $this->belongsToMany(Category::class, 'categories_products');
    }
}
