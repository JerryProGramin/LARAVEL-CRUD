<?php

declare(strict_types=1);

namespace Src\OrderProduct\Application\UseCase;

use Src\OrderProduct\Application\DTO\OrderProductResponse;
use Src\OrderProduct\Application\DTO\ShowOrderResponse;
use Src\OrderProduct\Application\DTO\ShowProductResponse;
use Src\OrderProduct\Domain\Repository\OrderProductRepository;
use Src\PaymentMethod\Application\DTO\PaymentMethodResponse;
use Src\User\Application\DTO\UserResponse;

class OrderProductShow
{
    public function __construct(
        private OrderProductRepository $orderProducts,
    ) {}

    public function execute(int $id): OrderProductResponse
    {
        $orderProduct = $this->orderProducts->getShow($id);
        return new OrderProductResponse(
            id: $orderProduct->getId(),
            order: new ShowOrderResponse(
                id: $orderProduct->getOrder()->getId(),
                user: new UserResponse(
                    id: $orderProduct->getOrder()->getUser()->getId(),
                    email: $orderProduct->getOrder()->getUser()->getEmail(),
                ),
                date: $orderProduct->getOrder()->getDate(),
                paymentMethod: new PaymentMethodResponse(
                    id: $orderProduct->getOrder()->getPaymentMethod()->getId(),
                    name: $orderProduct->getOrder()->getPaymentMethod()->getName(),
                    details: $orderProduct->getOrder()->getPaymentMethod()->getDetails(),                    ),
                total: $orderProduct->getOrder()->getTotal(),
                orderNumber: $orderProduct->getOrder()->getOrderNumber(),
            ),
            product: new ShowProductResponse(
                id: $orderProduct->getProduct()->getId(),
                name: $orderProduct->getProduct()->getName(),
                price: $orderProduct->getProduct()->getPrice(),
            ),
            priceUnit: $orderProduct->getPriceUnit(),
            quantity: $orderProduct->getQuantity(),
            subtotal: $orderProduct->getSubtotal()
        );
    }
}
