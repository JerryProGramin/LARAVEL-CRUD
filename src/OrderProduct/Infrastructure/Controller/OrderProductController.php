<?php

declare(strict_types=1);

namespace Src\OrderProduct\Infrastructure\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Src\OrderProduct\Application\UseCase\OrderProductShow;
use Src\OrderProduct\Application\UseCase\OrderProductsShow;

class OrderProductController extends Controller
{
    public function __construct(
        private OrderProductsShow $orderProducts,
        private OrderProductShow $orderProduct
    ) {}

    public function index(): JsonResponse
    {
        $getOrderProducts = $this->orderProducts->execute();
        return new JsonResponse($getOrderProducts);
    }

    public function show(int $id): JsonResponse
    {
        $getOrderProduct = $this->orderProduct->execute($id);
        return new JsonResponse($getOrderProduct);
    }
}