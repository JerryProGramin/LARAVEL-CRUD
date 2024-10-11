<?php

declare(strict_types=1);

namespace Src\Product\Application\DTO;

class ProductResponse
{
    public function __construct(
        public int $id,
        public string $name,
        public string $description,
        public float $price,
        public ProductCategoryResponse $category,
        public ProductSupplierResponse $supplier
    ) {}
}
