<?php

declare(strict_types=1);

namespace Src\Product\Infrastructure\Controller;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProductRequest;
use Illuminate\Http\JsonResponse;
use Src\Product\Application\UseCase\ProductDelete;
use Src\Product\Application\UseCase\ProductRegister;
use Src\Product\Application\UseCase\ProductsShow;
use Src\Product\Application\UseCase\ProductShow;
use Src\Product\Application\UseCase\ProductUpdate;

class ProductController extends Controller
{
    public function __construct(
        private ProductsShow $products,
        private ProductShow $product,
        private ProductRegister $productRegister,
        private ProductUpdate $productUpdate,
        private ProductDelete $productDelete,
    ) {}

    public function index(): JsonResponse
    {
        $getProducts = $this->products->execute();
        return new JsonResponse($getProducts);
    }

    public function show(int $id): JsonResponse
    {
        $getProduct = $this->product->execute($id);
        return new JsonResponse($getProduct);
    }

    public function update(int $id, StoreProductRequest $request): JsonResponse
    {
        $this->productUpdate->execute($id, $request);
        return response()->json(['message' => 'Product updated successfully']);
    }

    public function store(StoreProductRequest $request): JsonResponse
    {
        $this->productRegister->execute($request);
        return response()->json(['message' => 'Product created successfully'], 201);
    }
    
    public function delete(int $id): JsonResponse
    {
        $this->productDelete->execute($id);
        return response()->json(['message' => 'Product deleted successfully']);
    }
}
