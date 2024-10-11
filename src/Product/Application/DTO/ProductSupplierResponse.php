<?php 

declare(strict_types = 1);

namespace Src\Product\Application\DTO;

class ProductSupplierResponse
{
    public function __construct(
        public int $id,
        public string $name,
    ){}
}