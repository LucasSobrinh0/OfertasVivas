<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return response()->json(Product::latest('id')->get());
    }
    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'nullable|integer|min:0',
            'price' => 'nullable|numeric|min:0',
        ]);
        return response()->json(Product::create($data), 201);
    }
    public function show(Product $product)   { return response()->json($product); }
    public function update(Request $r, Product $product) {
        $data = $r->validate([
            'name' => 'sometimes|required|string|max:255',
            'quantity' => 'sometimes|integer|min:0',
            'price' => 'sometimes|numeric|min:0',
        ]);
        $product->update($data);
        return response()->json($product);
    }
    public function destroy(Product $product){ $product->delete(); return response()->json(null, 204); }
}
