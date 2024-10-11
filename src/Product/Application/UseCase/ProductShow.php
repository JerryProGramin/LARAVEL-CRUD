<?php 

declare(strict_types = 1);

namespace Src\Product\Application\UseCase;

use Src\Category\Application\DTO\CategoryResponse;
use Src\Product\Application\DTO\ProductCategoryResponse;
use Src\Product\Application\DTO\ProductResponse;
use Src\Product\Application\DTO\ProductSupplierResponse;
use Src\Product\Domain\Repository\ProductRepositoryInterface;
use Src\Supplier\Application\DTO\SupplierResponse;

class ProductShow
{
    public function __construct(
        private ProductRepositoryInterface $productRepository,
    ) {}
    public function execute(int $id): ProductResponse
    {
        $produtc = $this->productRepository->getShow($id);
        return new ProductResponse(
            id: $produtc->getId(),
            name: $produtc->getName(),
            description: $produtc->getDescription(),
            price: $produtc->getPrice(),
            category: new ProductCategoryResponse(
                id: $produtc->getCategory()->getId(),
                name: $produtc->getCategory()->getName()
            ),
            supplier: new ProductSupplierResponse(
                id: $produtc->getSupplier()->getId(),
                name: $produtc->getSupplier()->getName()
            ),
        );
    }
}