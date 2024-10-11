<?php

declare(strict_types=1);

namespace Src\OrderProduct\Application\DTO;

class ShowProductResponse
{
    public function __construct(
        public int $id,
        public string $name,
        public float $price,
    ) {}
}
