<?php

use CodeShopping\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //isso é uma collection do Elloquent que faz a persistencia do banco de dados
        $categorias = \CodeShopping\Models\Category::all();
        factory(Product::class, 30)
        ->create()
        ->each(function(Product $product) use($categorias){
            $categoryId = $categorias->random()->id;
            $product->categories()->attach($categoryId);
        });
    }
}
