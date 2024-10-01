<?php

declare(strict_types=1);

namespace Src\Category\Infrastructure;

use Illuminate\Support\ServiceProvider;
use Src\Category\Domain\Repository\CategoryRepositoryInterface;
use Src\Category\Infrastructure\Persistence\CategoryPersistence;

class CategoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(CategoryRepositoryInterface::class, CategoryPersistence::class);
    }
}
