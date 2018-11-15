<?php

namespace CodeShopping\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class ProductInput extends Model
{
    protected $fillable = ['amount','product_id'];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
//select * from product_inputs
//cada vez que eu acesso o relacionamento ------------> consulta o banco de dados