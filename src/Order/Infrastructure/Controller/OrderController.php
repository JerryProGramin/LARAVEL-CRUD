<?php

declare(strict_types=1);

namespace Src\Order\Infrastructure\Controller;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\CustomerOrderRequest;
use Exception;
use Illuminate\Http\JsonResponse;
use Src\Order\Application\UseCase\OrderRegister;
use Src\Order\Application\UseCase\OrdersShow;
use Src\Order\Application\UseCase\OrderShow;

class OrderController extends Controller
{
    public function __construct(
        private OrdersShow $ordersShow,
        private OrderShow $orderShow,
        private OrderRegister $orderRegister
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

    public function store(CustomerOrderRequest $request): JsonResponse
    {
        $validatedData = $request->validated(); // Obtener datos validados del request
        $newOrder = $this->orderRegister->execute($validatedData); // Registrar la orden

        return new JsonResponse($newOrder, JsonResponse::HTTP_CREATED);
    }
}
