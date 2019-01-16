<?php

use Illuminate\Database\Seeder;

class ProductPhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = CodeShopping\Models\Product::all();
        $products->each(function($product){

        });
    }

    private function deleteAllPhotosInProductsPath(){
        $path = CodeShopping\Models\ProductPhoto::PRODUCTS_PATH;
        \file::deleteDirectory(storage_path($path), true);
    }
}
