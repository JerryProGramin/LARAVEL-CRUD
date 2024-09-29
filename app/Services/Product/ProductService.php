<?php

declare(strict_types=1);

namespace App\Services\Product;

use App\Models\Product;
use App\Models\Order;

class ProductService
{
    public function getProduct($productId): Product
    {
        return Product::findOrFail($productId);
    }

    public function attachProductOrder(Order $order, Product $product, array $productData): void
    {
        $order->products()->attach($product->id, [
            'price_unit' => $product->price,
            'quantity' => $productData['quantity'],
            'subtotal' => $product->price * $productData['quantity']
        ]);
    }
}
