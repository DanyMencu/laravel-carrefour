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


    //relations with allergens
    public function allergens()
    {
        return $this->belongsToMany('App\Allergen', 'product_allerge');
    }
}
