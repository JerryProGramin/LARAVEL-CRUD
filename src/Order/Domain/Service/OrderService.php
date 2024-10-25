<?php

declare(strict_types=1);

namespace Src\Order\Domain\Service;

use Src\Order\Domain\Model\NewOrder;

class OrderService
{

    public function __construct(
        private ProductOrderingService $productService,
        private InventoryService $inventoryService
    ) {
    }

    public function createOrder(array $validatedData): NewOrder
    {
        $totalPrice = 0;
        $order = new NewOrder(
            id: 0,
            user: $validatedData['user'],
            date: new \DateTime(),
            paymentMethod: $validatedData['payment_method'],
            total: 0,
            orderNumber: $this->generateOrderNumber()
        );

        foreach ($validatedData['products'] as $productData) {
            $product = $this->productService->getProduct($productData['id']);
            $this->inventoryService->validateStock($product, $productData['quantity']);

            $price = $product->getPrice() * $productData['quantity'];
            $totalPrice += $price;

            $this->productService->attachProductOrder($order, $product, $productData);
            $this->inventoryService->updateInventory($product, $productData['quantity']);
        }

        $order->setTotal($totalPrice);

        return $order;
    }

    private function generateOrderNumber(): string
    {
        return strtoupper(bin2hex(random_bytes(5)));
    }
}
