<?php

declare(strict_types=1);

namespace Src\Product\Application\DTO;

use Src\Category\Application\DTO\CategoryResponse;
use Src\Supplier\Application\DTO\SupplierResponse;

class ProductResponse
{
    public function __construct(
        public int $id,
        public string $name,
        public string $description,
        public float $price,
        public CategoryResponse $category,
        public SupplierResponse $supplier
    ) {}
}
