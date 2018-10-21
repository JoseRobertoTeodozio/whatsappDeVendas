<?php

namespace CodeShopping\Http\Controllers\Api;

use CodeShopping\Http\Controllers\Controller;
use CodeShopping\Http\Requests\ProductCategoryRequest;
use CodeShopping\Models\Product;
use CodeShopping\Models\Category;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    //listar relacionamentos
    public function index(Product $produto)
    {
        return $produto->categories;
    }

    // passar um campo de categorias
    // fazer uma sincronização em de fazer um attach
    public function store(ProductCategoryRequest $request, Product $product)
    {
       $changed =  $product->categories()->sync($request->categories);
       $categoriesAttachedId = $changed['attached'];
       $categories = Category::whereIn('id', $categoriesAttachedId)->get();
        return $categories->count() ? response()->json($categories, '201') : [];
    }

    public function destroy(Product $p, Category $c)
    {
        $p->categories()->detach($c->id);
        return response()->json([], 204);
    }
}
