<?php 

declare(strict_types = 1);

namespace Src\OrderProduct\Infrastructure\Persistence;

use App\Models\OrderProduct as AppOrderProduct;
use Src\Order\Domain\Model\Order;
use Src\OrderProduct\Domain\Model\OrderProduct;
use Src\OrderProduct\Domain\Repository\OrderProductRepository;
use Src\PaymentMethod\Domain\Model\PaymentMethod;
use Src\Product\Domain\Model\Product;
use Src\User\Domain\Model\User;

class OrderProductPersistence implements OrderProductRepository
{
    public function getAll(): array
    {   
        $orderProducts = AppOrderProduct::all();
        return $orderProducts->map(function ($orderProduct){
            return new OrderProduct(
                $orderProduct->id,
                new Order(
                    $orderProduct->order->id,
                    new User(
                        $orderProduct->order->user->id,
                        $orderProduct->order->user->email,
                    ),
                    $orderProduct->order->date,
                    new PaymentMethod(
                        $orderProduct->order->payment_method->id,
                        $orderProduct->order->payment_method->name,
                        $orderProduct->order->payment_method->details,
                    ),
                    $orderProduct->order->total,
                    $orderProduct->order->order_number,
                ),
                new Product(
                    $orderProduct->product->id,
                    $orderProduct->product->name,
                    $orderProduct->product->description,
                    $orderProduct->product->price,
                ),

                $orderProduct->priceUnit,
                $orderProduct->quantity,
                $orderProduct->subTotal,
            );
        })->toArray();
    }

    public function getShow(int $id): OrderProduct
    {
        $orderProduct = AppOrderProduct::find($id);
        if (!$orderProduct) {
            throw new \Exception("OrderProduct not found.");
        }
        return new OrderProduct(
            $orderProduct->id,
            new Order(
                $orderProduct->order->id,
                new User(
                    $orderProduct->order->user->id,
                    $orderProduct->order->user->email,
                ),
                $orderProduct->order->date,
                new PaymentMethod(
                    $orderProduct->order->payment_method->id,
                    $orderProduct->order->payment_method->name,
                    $orderProduct->order->payment_method->details,
                ),
                $orderProduct->order->total,
                $orderProduct->order->order_number,
            ),
            new Product(
                $orderProduct->product->id,
                $orderProduct->product->name,
                $orderProduct->product->description,
                $orderProduct->product->price,
            ),
            $orderProduct->priceUnit,
            $orderProduct->quantity,
            $orderProduct->subTotal,
        );
    }
}