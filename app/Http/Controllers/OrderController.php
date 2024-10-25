<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\CustomerOrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Services\Order\OrderService;
use Exception;
use Illuminate\Http\JsonResponse;

class OrderController extends Controller
{
    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }
    protected $orderService;

    public function index(): JsonResponse
    {
        $orders = Order::all();
        return new JsonResponse(OrderResource::collection($orders));
    }
    
    public function store(CustomerOrderRequest $request): JsonResponse
    {
        try {
            $validated = $request->validated();
            $this->orderService->createOrder($validated);

            return response()->json([
                'message' => 'Pedido creado exitosamente',
            ], 201);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
