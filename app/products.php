<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{

    protected $table = 'products';
    protected $fillable = [
        'product_name',
        'number',
        'price',
        'created_by',
        'image',
        'total_price',
    ];

    public function getImageAttribute($vale) {

        return ($vale !== null) ? asset('assets/images/products/'.$vale) : "";

    }
}
