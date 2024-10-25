<?php 

declare(strict_types = 1);

namespace Src\Product\Application\UseCase;

use Src\Product\Application\DTO\ProductResponse;
use Src\Product\Domain\Repository\ProductRepositoryInterface;
use Src\Shared\Application\DTO\CategoryResponse as SharedCategoryResponse;
use Src\Shared\Application\DTO\SupplierResponse as SharedSupplierResponse;

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
            category: new SharedCategoryResponse(
                id: $produtc->getCategory()->getId(),
                name: $produtc->getCategory()->getName()
            ),
            supplier: new SharedSupplierResponse(
                id: $produtc->getSupplier()->getId(),
                name: $produtc->getSupplier()->getName()
            ),
        );
    }
}