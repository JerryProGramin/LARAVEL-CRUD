<?php

declare(strict_types=1);

namespace Src\Order\Domain\Service;

use App\Models\Order;
use App\Services\Product\ProductService;
use App\Services\Inventory\InventoryService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderService
{
    public function __construct(
        private ProductService $productService,
        private InventoryService $inventoryService
    ) {}

    public function createOrder(array $validatedData): Order
    {
        return DB::transaction(function () use ($validatedData) {
            $totalPrice = 0;

            foreach ($validatedData['products'] as $productData) {
                $product = $this->productService->getProduct($productData['id']);
                $this->inventoryService->validateStock($product, $productData['quantity']);

                $price = $product->price * $productData['quantity'];
                $totalPrice += $price;
            }

            $order = Order::create([
                'user_id' => Auth::id(),
                'date' => now(),
                'payment_method_id' => $validatedData['payment_method_id'],
                'total' => $totalPrice,
                'order_number' => Str::random(10),
            ]);

            foreach ($validatedData['products'] as $productData) {
                $product = $this->productService->getProduct($productData['id']);
                $this->inventoryService->updateInventory($product, $productData['quantity']);
                $this->productService->attachProductOrder($order, $product, $productData);
            }

            return $order;
        });
    }
}
