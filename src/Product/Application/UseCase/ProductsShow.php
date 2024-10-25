<?php

declare(strict_types=1);

namespace Src\Product\Application\UseCase;

use Src\Product\Application\DTO\ProductResponse;
use Src\Product\Domain\Repository\ProductRepositoryInterface;
use Src\Shared\Application\DTO\CategoryResponse as SharedCategoryResponse;
use Src\Shared\Application\DTO\SupplierResponse as SharedSupplierResponse;

class ProductsShow
{
    public function __construct(
        private ProductRepositoryInterface $products,
    ) {}

    public function execute(): array
    {
        $productsShow = $this->products->getAll();

        return array_map(function ($product) {
            return new ProductResponse(
                id: $product->getId(),
                name: $product->getName(),
                description: $product->getDescription(),
                price: $product->getPrice(),
                category: new SharedCategoryResponse(
                    id: $product->getCategory()->getId(),
                    name: $product->getCategory()->getName()
                ),
                supplier: new SharedSupplierResponse(
                    id: $product->getSupplier()->getId(),
                    name: $product->getSupplier()->getName()
                ),
            );
        }, $productsShow);
    }
}
