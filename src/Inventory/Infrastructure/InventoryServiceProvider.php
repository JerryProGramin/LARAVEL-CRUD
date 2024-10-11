<?php

declare(strict_types=1);

namespace Src\Inventory\Infrastructure;

use Illuminate\Support\ServiceProvider;
use Src\Inventory\Domain\Repository\InventoryRepositoryInterface;
use Src\Inventory\Infrastructure\Persistence\InventoryPersistence;

class InventoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(InventoryRepositoryInterface::class, InventoryPersistence::class);
    }
}
