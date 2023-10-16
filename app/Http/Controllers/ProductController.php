<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Create a new product
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'description' => 'nullable',
            'supplier' => 'required',
        ]);
        $product = Product::create($validatedData);

        return response()->json(['message' => 'Product created successfully', 'data' => $product], 201);
    }

    // Read a product by ID
    public function show($id): \Illuminate\Http\JsonResponse
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        return response()->json(['data' => $product], 200);
    }

    // Update a product by ID
    public function update(Request $request, $id): \Illuminate\Http\JsonResponse
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'description' => 'nullable',
            'supplier' => 'required',
        ]);

        $product->update($validatedData);

        return response()->json(['message' => 'Product updated successfully', 'data' => $product], 200);
    }

    // Delete a product by ID
    public function delete($id): \Illuminate\Http\JsonResponse
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->delete();

        return response()->json(['message' => 'Product deleted successfully'], 200);
    }

    // List all products
    public function index(): \Illuminate\Http\JsonResponse
    {
        $products = Product::all();

        return response()->json(['data' => $products], 200);
    }
}
