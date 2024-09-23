<?php 

declare(strict_types = 1);

namespace App\Services\Order;

use App\Models\Inventory;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderService 
{
    public function createOrder(array $validatedData): Order
    {
        return DB::transaction(function () use ($validatedData) {
            $totalPrice = 0;

            foreach ($validatedData['products'] as $productData) {
                $product = $this->getProduct($productData['id']);
                $this->validateStock($product, $productData['quantity']);

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
                $product = $this->getProduct($productData['id']);
                $this->updateInventory($product, $productData['quantity']);
                $this->attachProductOrder($order, $product, $productData);
            }

            return $order;
        });
    }

    private function getProduct($productId): Product
    {
        return Product::findOrFail($productId);
    }

    private function validateStock(Product $product, int $quantity): void
    {
        $inventory = Inventory::where('product_id', $product->id)->firstOrFail();
        if ($inventory->stock < $quantity) {
            throw new \Exception("No hay suficiente stock para el producto: {$product->name}");
        }
    }

    private function updateInventory(Product $product, int $quantity): void
    {
        $inventory = Inventory::where('product_id', $product->id)->first();
        $inventory->decrement('stock', $quantity);
    }

    private function attachProductOrder(Order $order, Product $product, array $productData): void
    {
        $order->products()->attach($product->id, [
            'price_unit' => $product->price,
            'quantity' => $productData['quantity'],
            'subtotal' => $product->price * $productData['quantity']
        ]);
    }
}