<?php

declare(strict_types=1);

namespace Src\Order\Infrastructure\Persistence;

use App\Models\Order as AppOrder;
use Src\Order\Domain\Model\Order;
use Src\Order\Domain\Repository\OrderRepositoryInterface;
use Src\PaymentMethod\Domain\Model\PaymentMethod;
use Src\User\Domain\Model\User;

class OrderPersistence implements OrderRepositoryInterface
{
    public function getAll(): array
    {
        $orders = AppOrder::all();
        return $orders->map(function ($order){
            return new Order(
                $order->id,
                new User(
                    $order->user->id,
                    $order->user->email,
                ),
                $order->date,
                new PaymentMethod(
                    $order->payment_method->id,
                    $order->payment_method->name,
                    $order->payment_method->details,
                ),
                (float)$order->total,
                $order->order_number,
            );
        })->toArray();
    }

    public function getShow(int $id): Order
    {
        $order = AppOrder::find($id);
        if (!$order) {
            throw new \Exception("Order not found.");
        }

        return new Order(
            $order->id,
            new User(
                $order->user->id,
                $order->user->email,
            ),
            $order->date,
            new PaymentMethod(
                $order->payment_method->id,
                $order->payment_method->name,
                $order->payment_method->details,
            ),
            (float)$order->total,
            $order->order_number,
        );
    }
}