<?php

declare(strict_types=1);

namespace Src\Product\Infrastructure\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Src\Product\Application\UseCase\ProductsShow;
use Src\Product\Application\UseCase\ProductShow;

class ProductController extends Controller
{
    public function __construct(
        private ProductsShow $products,
        private ProductShow $product
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
}
