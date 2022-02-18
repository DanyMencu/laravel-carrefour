<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
    public function index(){
        $products = Product::all();

        foreach ($products as $product) {
            if($product->cover) {
                $product->cover = url('storage/' . $product->cover);
            }
        }

        return response()->json($products);
    }

    // PRODUCT DETAIL
    public function show($slug) {

        // prendo il post con categorie, allergeni e type
        $product = Product::where('slug', $slug)->with('category', 'allergens', 'type')->first();

         if(! $product) {
             $$product['not_found'] = true;
         } elseif($product->cover) {
             $product->cover = url('storage/' . $product->cover);
         }

        return response()->json($product);
    }
}