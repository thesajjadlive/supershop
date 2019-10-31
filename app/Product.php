<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $fillable=[
        'category_id',
        'brand_id',
        'name',
        'size',
        'color',
        'description',
        'price',
        'stock',
        'is_featured',
        'status'
    ];



    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function product_image()
    {
        return $this->hasMany(ProductImage::class);
    }
}
