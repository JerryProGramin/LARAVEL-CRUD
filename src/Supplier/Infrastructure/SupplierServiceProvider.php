<?php

declare(strict_types=1);

namespace Src\Supplier\Infrastructure;

use Illuminate\Support\ServiceProvider;
use Src\Supplier\Domain\Repository\SupplierRepositoryInterface;
use Src\Supplier\Infrastructure\Persistence\SupplierPersistence;

class SupplierServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(SupplierRepositoryInterface::class, SupplierPersistence::class);
    }
}
