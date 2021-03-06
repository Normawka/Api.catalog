<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\Product;
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
//        Category::factory(8)->create();
//        Product::factory(30)->create();
        CategoryProduct::factory(40)->create();
    }
}
