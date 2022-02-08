<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Food status categories
        $categories = ['Fresh', 'Frozen'];
        
        foreach ($categories as $category){
            $new_category = new Category();

            $new_category->status = $category;
            $new_category->slug = Str::slug($new_category->status, '-');

            $new_category->save();

        }
    }
}
