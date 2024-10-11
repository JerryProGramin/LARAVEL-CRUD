<?php 

declare(strict_types = 1);

namespace Src\Inventory\Domain\Model;

use Src\Product\Domain\Model\Product;

class Inventory
{
    public function __construct(
        private int $id,
        private Product $product,
        private int $stock
    ){}

    public function getId(): int {return $this->id;}
    public function getProduct(): Product {return $this->product;}
    public function getStock(): int{return $this->stock;}
}