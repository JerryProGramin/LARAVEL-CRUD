<?php 

declare(strict_types = 1);

namespace Src\Product\Infrastructure;

use Illuminate\Support\ServiceProvider;
use Src\Product\Domain\Repository\ProductRepositoryInterface;
use Src\Product\Infrastructure\Persistence\ProductPersistence;

class ProductServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(ProductRepositoryInterface::class, ProductPersistence::class);
    }
}