<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //Mass assignment
    protected $fillable = [
        'name',
        'slug',
        'description',
        'price'
    ];
}
