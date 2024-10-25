<?php

declare(strict_types=1);

namespace Src\Product\Application\DTO;

use Src\Shared\Application\DTO\CategoryResponse as SharedCategoryResponse;
use Src\Shared\Application\DTO\SupplierResponse as SharedSupplierResponse;

class ProductResponse
{
    public function __construct(
        public int $id,
        public string $name,
        public string $description,
        public float $price,
        public SharedCategoryResponse $category,
        public SharedSupplierResponse $supplier
    ) {}
}
