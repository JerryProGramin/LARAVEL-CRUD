<?php 

declare(strict_types = 1); 

namespace Src\Inventory\Application\DTO;

use Src\Product\Application\DTO\ProductResponse;

class InventoryResponse
{
    public function __construct(
        public int $id,
        public ProductResponse $product,
        public int $stock
    ){}
}