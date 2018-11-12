<?php

namespace CodeShopping\Http\Controllers\Api;

use CodeShopping\Http\Requests\ProductInputRequest;
use CodeShopping\Http\Resources\ProductInputResource;
use CodeShopping\Http\Controllers\Controller;
use CodeShopping\Models\ProductInput;
use Illuminate\Http\Request;

class ProductInputController extends Controller
{
   
    public function index()
    {
        $inputs = ProductInput::with('product')->paginate(); //eager loader | lazy loading -----> carregamento atrasado
        return ProductInputResource::collection($inputs);
    }

    public function store(ProductInputRequest $request)
    {
        $input = ProductInput::create($request->all());
        $product = $input->product;
        $product->stock += $input->amount;
        $product->save();
        return new ProductInputResource($input);
    }

    public function show(ProductInput $input)
    {
        return new ProductInputResource($input);
    }

}