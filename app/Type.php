<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    //Relation with Products
    public function Products()
    {
        return $this->hasMany('App\Product');
    }
}
