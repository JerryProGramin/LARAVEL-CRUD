<?php

declare(strict_types=1);

namespace App\Services\Inventory;

use App\Models\Inventory;
use App\Models\Product;

class InventoryService
{
    public function validateStock(Product $product, int $quantity): void
    {
        $inventory = Inventory::where('product_id', $product->id)->firstOrFail();
        if ($inventory->stock < $quantity) throw new \Exception("No hay suficiente stock para el producto: {$product->name}");
    }

    public function updateInventory(Product $product, int $quantity): void
    {
        $inventory = Inventory::where('product_id', $product->id)->first();
        $inventory->decrement('stock', $quantity);
    }
}
