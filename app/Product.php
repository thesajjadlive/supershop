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
        'status'
    ];
}
