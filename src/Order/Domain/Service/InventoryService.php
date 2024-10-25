<?php

declare(strict_types=1);

namespace Src\Order\Domain\Service;

use Src\Order\Domain\Model\Inventory;
use Src\Product\Domain\Model\Product;

class InventoryService
{
    public function __construct(
        private array $inventories
    ){
    }

    public function validateStock(Product $product, int $quantity): void
    {
        $inventory = $this->getInventoryByProduct($product);

        if ($inventory->getStock() < $quantity) {
            throw new \Exception("No hay suficiente stock para el producto: {$product->getName()}");
        }
    }

    public function updateInventory(Product $product, int $quantity): void
    {
        $inventory = $this->getInventoryByProduct($product);
        $inventory->decrementStock($quantity);
    }

    private function getInventoryByProduct(Product $product): Inventory
    {
        foreach ($this->inventories as $inventory) {
            if ($inventory->getProduct()->getId() === $product->getId()) {
                return $inventory;
            }
        }

        throw new \Exception("Inventario no encontrado para el producto: {$product->getName()}");
    }
}
