<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Allergen extends Model
{
    //relations with products
    public function products()
    {
        return $this->belongsToMany('App\Product', 'product_allerge');
    }
}
