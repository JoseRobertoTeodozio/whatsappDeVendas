<?php

namespace CodeShopping\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class ProductOutput extends Model
{
    protected $fillable = ['amount', 'product_id'];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
