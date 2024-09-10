<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(): JsonResponse
    {
        $products = Product::with(['category', 'supplier'])->get();
        return new JsonResponse(ProductResource::collection($products));
    }
    public function show(Product $product): JsonResponse
    {
        $product->load(['category', 'supplier']);
        return response()->json(new ProductResource($product));
    }

    public function store(StoreProductRequest $request): JsonResponse
    {
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'supplier_id' => $request->supplier_id,
            'category_id' => $request->category_id,
        ]);
        return new JsonResponse(['message' => 'Product registered successfully']);
    }

    public function update(Product $product, StoreProductRequest $request): JsonResponse
    {
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'supplier_id' => $request->supplier_id,
            'category_id' => $request->category_id,
        ]);
        return new JsonResponse(['message' => 'Product updated successfully']);
    }

    public function delete(Product $product): JsonResponse
    {
        $product->delete();
        return new JsonResponse(['message' => 'Product deleted successfully']);
    }
}
