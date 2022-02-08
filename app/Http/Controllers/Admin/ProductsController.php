<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Category;
use App\Product;
use App\Allergen;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   

        //categories records
        $categories = Category::all();

        //Add new product
        $allergens = Allergen::all();
        return view('admin.products.create', compact('allergens', 'categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validazione
        $request->validate([
            'name' => 'required|max: 255',
            'description' => 'required',
            'price' => 'required',
        ],
        [
            'required' => 'The :attribute is a required field. Don\'t forget it!',
            'max' => 'Max :max characters allowed for the :attribute',
        ]
    );

       


        // $request->validate($this->validation_rules(), $this->validation_messages());
        //Register a new product
        $data = $request->all();
        //dd($data);

        $new_product = new Product();

        //Gen unique Slug
        $slug = Str::slug($data['name'], '-');
        $count = 1;
        $base_slug = $slug;

        while (Product::where('slug', $slug)->first()) {
            $slug = $base_slug . '-' . $count;
            $count++;
        }

        $data['slug'] = $slug;

        $new_product->fill($data);
        $new_product->save();

        //salvataggio in pivot
        if (array_key_exists('allergens', $data)) {
            $new_product->allergens()->attach($data['allergens']);
        }

        return redirect()->route('admin.products.show', $new_product->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->first(); //in caso di doppione, vuol dire che prende il primo che trova
        if ($product) {
            return view('admin.products.show', compact('product'));
        }
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        
        $categories = Category::all();
        $allergens = Allergen::all();

        if (! $product) {
            abort(404);
        }

        return view('admin.products.edit', compact('product','categories', 'allergens'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Update product details
        $data = $request->all();

        $product = Product::find($id);

        //Slug update if name is changed
        if ($data['name'] != $product->name) {
            //Gen unique slug
            $slug = Str::slug($data['name'], '-');
            $count = 1;
            $base_slug = $slug;

            //Unique validation
            while (product::where('slug', $slug)->first()) {
                $slug = $base_slug . '-' . $count;
                $count++;
            }

            //Create a slug inside DATA array
            $data['slug'] = $slug;
        } else {
            $data['slug'] = $product->slug;
        };

        $product->update($data);

        if (array_key_exists('allergens', $data)) {
            $product->allergens()->sync($data['allergens']);
        } else {
            $product->allergens()->detach();
        }

        return redirect()->route('admin.products.show', $product->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            return redirect()->route('admin.products.index')->with('message', 'The product was successfully removed.');
        }
    }

    // Validation rules

    // private function validation_rules() {
    //     return [
    //         'name' => 'required|max:255',
    //         'description' => 'required',
    //         'price' => 'required',
    //         'category_id' => 'nullable|exists:categories,id', //
    //         'allergens'=> 'nullable|exists:allergens,id'
    //     ];
    // }

    // private function validation_messages() {
    //     return [
    //         'required' => 'Remember to write the :attribute',
    //         'max' => 'Max :max characters allowed for the :attribute', 
    //         'category_id.exists' => 'The selected category doesn\'t exist.',
    //         'allergens_id.exists' => 'The selected allergens doesn\'t exist.'
    //     ];
    // }
}