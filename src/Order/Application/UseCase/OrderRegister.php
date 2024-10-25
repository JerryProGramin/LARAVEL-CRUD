<?php

declare(strict_types=1);

namespace Src\Order\Application\UseCase;

use Src\Order\Domain\Repository\OrderRepositoryInterface;
use Src\Order\Domain\Service\OrderService;
use Src\Order\Domain\Model\NewOrder;

class OrderRegister
{
    public function __construct(private OrderRepositoryInterface $orderRepository, private OrderService $orderService) {}

    public function execute(array $validatedData): NewOrder
    {
        return $this->orderService->createOrder($validatedData);
    }
}
