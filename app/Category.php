<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //Relation with Products
     public function products(){
        return $this->hasMany('App\Product');
    }
}
