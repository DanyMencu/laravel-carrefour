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
        'price',
        'type_id',
        'category_id',
        'cover'
    ];

    //Relation with Categories
    public function Category()
    {
        return $this->belongsTo('App\Category');
    }

    //Relation with types
    public function Type()
    {
        return $this->belongsTo('App\Type');
    }
    //relations with allergens
    public function allergens()
    {
        return $this->belongsToMany('App\Allergen', 'product_allerge');
    }
}
