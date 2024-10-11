<?php 

declare(strict_types = 1);

namespace Src\Product\Application\DTO;

use Src\Category\Domain\Model\Category;
use Src\Supplier\Domain\Model\Supplier;

class ProductRequest
{
    public function __construct(
        public string $name,
        public string $description,
        public float $price,
        public Category $category,
        public Supplier $supplier
    ){}
}