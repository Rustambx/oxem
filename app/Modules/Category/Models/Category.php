<?php

namespace App\Modules\Category\Models;

use App\Modules\Product\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'external_id', 'parent_id'];

    public function products ()
    {
        return $this->belongsToMany(Product::class, 'categories_products');
    }
}
