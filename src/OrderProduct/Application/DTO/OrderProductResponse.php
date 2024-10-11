<?php

declare(strict_types=1);

namespace Src\OrderProduct\Application\DTO;

class OrderProductResponse
{
    public function __construct(
        public int $id,
        public ShowOrderResponse $order,
        public ShowProductResponse $product,
        public float $priceUnit,
        public int $quantity,
        public float $subtotal
    ) {}
}
