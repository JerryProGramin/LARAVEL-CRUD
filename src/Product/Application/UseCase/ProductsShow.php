<?php

declare(strict_types=1);

namespace Src\Product\Application\UseCase;

use Src\Category\Application\DTO\CategoryResponse;
use Src\Product\Application\DTO\ProductCategoryResponse;
use Src\Product\Application\DTO\ProductResponse;
use Src\Product\Application\DTO\ProductSupplierResponse;
use Src\Product\Domain\Repository\ProductRepositoryInterface;
use Src\Supplier\Application\DTO\SupplierResponse;

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
                category: new ProductCategoryResponse(
                    id: $product->getCategory()->getId(),
                    name: $product->getCategory()->getName()
                ),
                supplier: new ProductSupplierResponse(
                    id: $product->getSupplier()->getId(),
                    name: $product->getSupplier()->getName()
                ),
            );
        }, $productsShow);
    }
}
