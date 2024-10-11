<?php

declare(strict_types=1);

namespace Src\Order\Application\UseCase;

use Src\Order\Application\DTO\OrderResponse;
use Src\Order\Domain\Repository\OrderRepositoryInterface;
use Src\PaymentMethod\Application\DTO\PaymentMethodResponse;
use Src\User\Application\DTO\UserResponse;

class OrdersShow
{
    public function __construct(
        private OrderRepositoryInterface $orders,
    ){}

    public function execute(): array
    {
        $ordersShow = $this->orders->getAll();

        return array_map(function ($order) {
            return new OrderResponse(
                id: $order->getId(),
                user: new UserResponse(
                    id: $order->getUser()->getId(),
                    email: $order->getUser()->getEmail(),
                ),
                date: $order->getDate(),
                paymentMethod: new PaymentMethodResponse(
                    id: $order->getPaymentMethod()->getId(),
                    name: $order->getPaymentMethod()->getName(),
                    details: $order->getPaymentMethod()->getDetails(),
                ),
                total: $order->getTotal(),
                orderNumber: $order->getOrderNumber(),
            );
        },$ordersShow);
    }
}