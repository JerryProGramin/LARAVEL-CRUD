<?php 

declare(strict_types = 1);

namespace Src\OrderProduct\Domain\Model;

use Src\Order\Domain\Model\Order;
use Src\Product\Domain\Model\Product;

class OrderProduct 
{
    public function __construct(
        private int $id,
        private Order $order,
        private Product $product,
        private float $priceUnit,
        private int $quantity,
        private float $subtotal
    ){}

    public function getId(): int {return $this->id;}
    public function getOrder(): Order {return $this->order;}
    public function getProduct(): Product {return $this->product;}
    public function getPriceUnit(): float {return $this->priceUnit;}
    public function getQuantity(): int {return $this->quantity;}
    public function getSubtotal(): float {return $this->subtotal;}
}