<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = ['Sofficini', 'Arance', 'Hamburger', 'Riso', 'Pollo', 'Tonno', 'Pizza'];

        foreach ($products as $product) {
            $new_prudct = new Product();

            $new_prudct->name = $product;
            $new_prudct->slug = Str::slug($product, '-');
            $new_prudct->description = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum";
            $new_prudct->price = rand(1, 100);

            $new_prudct->save();
        }
    }
}
