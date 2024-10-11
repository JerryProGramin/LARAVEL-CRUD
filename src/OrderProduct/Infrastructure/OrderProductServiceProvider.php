<?php

declare(strict_types=1);

namespace Src\OrderProduct\Infrastructure;

use Illuminate\Support\ServiceProvider;
use Src\OrderProduct\Domain\Repository\OrderProductRepository;
use Src\OrderProduct\Infrastructure\Persistence\OrderProductPersistence;

class OrderProductServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(OrderProductRepository::class, OrderProductPersistence::class);
    }
}
