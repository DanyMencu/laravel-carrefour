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

    //Relation with Categories
    public function Category(){
        return $this->belongsTo('App\Category');
}
    //relations with allergens
    public function allergens()
    {
        return $this->belongsToMany('App\Allergen', 'product_allerge');
    }
}