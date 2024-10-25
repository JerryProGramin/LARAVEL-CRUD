<?php

declare(strict_types = 1);

namespace Src\Order\Domain\Repository;

use App\Http\Requests\Order\CustomerOrderRequest;
use Illuminate\Http\JsonResponse;
use Src\Order\Domain\Model\NewOrder;
use Src\Order\Domain\Model\Order;

interface OrderRepositoryInterface
{
    public function getAll(): array;
    public function getShow(int $id): Order;
    public function registerOrder(NewOrder $newOrder): void;
}