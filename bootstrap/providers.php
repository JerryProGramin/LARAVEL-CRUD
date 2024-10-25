<?php

return [
    App\Providers\AppServiceProvider::class,
    Src\User\Infrastructure\UserServiceProvider::class,
    Src\Supplier\Infrastructure\SupplierServiceProvider::class,
    Src\Category\Infrastructure\CategoryServiceProvider::class,
    Src\Product\Infrastructure\ProductServiceProvider::class,
    Src\Order\Infrastructure\OrderServiceProvider::class,
    Src\OrderProduct\Infrastructure\OrderProductServiceProvider::class, 
];
