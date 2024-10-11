<?php

declare(strict_types = 1);

namespace Src\Order\Infrastructure;

use Illuminate\Support\ServiceProvider;
use Src\Order\Domain\Repository\OrderRepositoryInterface;
use Src\Order\Infrastructure\Persistence\OrderPersistence;

class OrderServiceProvider extends ServiceProvider
{
    public function register()
    { 
        $this->app->singleton(OrderRepositoryInterface::class, OrderPersistence::class);
    }
}