<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'category_id',
        'brand_id',
        'price',
        'stock',
        'size',
        'color',
        'sku',
        'image',
        'is_active',
    ];

    // Relationship with Category
    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }

    // Relationship with Brand
    public function brand()
    {
        return $this->belongsTo(Brands::class, 'brand_id');
    }
}
