<?php

namespace CodeShopping\Http\Controllers\Api;

use CodeShopping\Http\Resources\CategoryResource;
use CodeShopping\Http\Controllers\Controller;
use CodeShopping\Http\Requests\CategoryRequest;
use CodeShopping\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   
    public function index()
    {
        return CategoryResource::collection(Category::all());
    }

    public function store(CategoryRequest $request)
    {
       $category = Category::create($request->all());
       $category->refresh();
       return new CategoryResource($category);
    }

  
    public function show(Category $category) // mesmo nome do parâmetro do resource
    {
        return new CategoryResource($category);
    }

    
    public function update(CategoryRequest $request, Category $category)
    {
        $category->fill($request->all());
        $category->save();

        return new CategoryResource($category);
        // return response([], 204);
    }

   
    public function destroy(Category $category)
    {
        $category->delete();
        return response([], 204);
    }
}
