<?php 

declare(strict_types = 1);

namespace Src\Product\Application\UseCase;

use Src\Category\Application\DTO\CategoryResponse;
use Src\Category\Domain\Model\Category;
use Src\Product\Application\DTO\ProductResponse;
use Src\Product\Domain\Repository\ProductRepositoryInterface;
use Src\Supplier\Application\DTO\SupplierResponse;
use Src\Supplier\Domain\Model\Supplier;

class ProductShow
{
    public function __construct(
        private ProductRepositoryInterface $productRepository,
    ) {}
    public function execute(int $id): ProductResponse
    {
        $category = $this->productRepository->getShow($id);
        return new ProductResponse(
            id: $category->getId(),
            name: $category->getName(),
            description: $category->getDescription(),
            price: $category->getPrice(),
            category: new CategoryResponse(
                id: $category->getCategoryId()->getId(),
                name: $category->getCategoryId()->getName(),
                description: $category->getCategoryId()->getDescription()
            ),
            supplier: new SupplierResponse(
                id: $category->getSupplierId()->getId(),
                name: $category->getSupplierId()->getName(),
                contactInfo: $category->getSupplierId()->getContactInfo(),
                phone: $category->getSupplierId()->getPhone(),
                email: $category->getSupplierId()->getEmail(),
                address: $category->getSupplierId()->getAddress(),
                country: $category->getSupplierId()->getCountry()
            ),
        );
    }
}