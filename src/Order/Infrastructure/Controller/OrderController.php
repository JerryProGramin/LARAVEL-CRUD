<?php

declare(strict_types=1);

namespace Src\Order\Infrastructure\Controller;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\CustomerOrderRequest;
use Exception;
use Illuminate\Http\JsonResponse;
use Src\Order\Application\UseCase\OrdersShow;
use Src\Order\Application\UseCase\OrderShow;

class OrderController extends Controller
{
    public function __construct(
        private OrdersShow $ordersShow,
        private OrderShow $orderShow,
    ) {}

    public function index(): JsonResponse
    {
        $orders = $this->ordersShow->execute();
        return new JsonResponse($orders);
    }

    public function show(int $id): JsonResponse
    {
        $order = $this->orderShow->execute($id);
        return new JsonResponse($order);
    }
    // public function store(CustomerOrderRequest $request): JsonResponse
    // {
    //     try {
    //         $validated = $request->validated();
    //         $this->orderService->createOrder($validated);

    //         return response()->json([
    //             'message' => 'Pedido creado exitosamente',
    //         ], 201);
    //     } catch (Exception $e) {
    //         return response()->json(['error' => $e->getMessage()], 400);
    //     }
    // }
}
