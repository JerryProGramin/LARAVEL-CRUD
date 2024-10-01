<?php

declare(strict_types=1);

namespace Src\Product\Application\UseCase;

use Src\Category\Application\DTO\CategoryResponse;
use Src\Category\Domain\Model\Category;
use Src\Product\Application\DTO\ProductResponse;
use Src\Product\Domain\Repository\ProductRepositoryInterface;
use Src\Supplier\Application\DTO\SupplierResponse;
use Src\Supplier\Domain\Model\Supplier;

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
                category: new CategoryResponse(
                    id: $product->getCategoryId()->getId(),
                    name: $product->getCategoryId()->getName(),
                    description: $product->getCategoryId()->getDescription()
                ),
                supplier: new SupplierResponse(
                    id: $product->getSupplierId()->getId(),
                    name: $product->getSupplierId()->getName(),
                    contactInfo: $product->getSupplierId()->getContactInfo(),
                    phone: $product->getSupplierId()->getPhone(),
                    email: $product->getSupplierId()->getEmail(),
                    address: $product->getSupplierId()->getAddress(),
                    country: $product->getSupplierId()->getCountry()
                ),
            );
        }, $productsShow);
    }
}
