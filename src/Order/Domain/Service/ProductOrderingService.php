<?php

declare(strict_types=1);

namespace Src\Order\Domain\Service;

use Src\Order\Domain\Model\NewOrder;
use Src\Order\Domain\Model\Order;
use Src\Product\Domain\Model\Product;

class ProductOrderingService
{
    private array $products;

    public function __construct(array $products)
    {
        $this->products = $products;
    }

    public function getProduct(int $productId): Product
    {
        foreach ($this->products as $product) {
            if ($product->getId() === $productId) {
                return $product;
            }
        }

        throw new \Exception("Producto con ID: {$productId} no encontrado.");
    }

    public function attachProductOrder(NewOrder $order, Product $product, array $productData): void
    {
        $order->addProduct([
            'product' => $product,
            'price_unit' => $product->getPrice(),
            'quantity' => $productData['quantity'],
            'subtotal' => $product->getPrice() * $productData['quantity']
        ]);
    }
}
