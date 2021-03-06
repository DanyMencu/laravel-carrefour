<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ProductsTableSeeder::class,
            CategoriesTableSeeder::class,
            AllergensTableSeeder::class,
            TypesTableSeeder::class,
        ]);
    }
}
