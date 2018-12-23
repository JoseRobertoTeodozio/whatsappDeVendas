<?php

namespace CodeShopping\Models;

use Illuminate\Database\Eloquent\Model;

class productPhoto extends Model
{
    protected $fillable = ['file_name', 'product_id'];
}
