<?php

declare(strict_types=1);

namespace Src\Inventory\Application\UseCase;

use Src\Inventory\Application\DTO\InventoryResponse;
use Src\Inventory\Domain\Repository\InventoryRepositoryInterface;
use Src\Product\Application\DTO\ProductResponse;
use Src\Shared\Application\DTO\CategoryResponse as SharedCategoryResponse;
use Src\Shared\Application\DTO\SupplierResponse as SharedSupplierResponse;

class InventoryShow
{
    public function __construct(
        private InventoryRepositoryInterface $inventoryRepository
    ){}

    public function execute(int $id): InventoryResponse
    {
        $inventory = $this->inventoryRepository->getShow($id);
        return new InventoryResponse(
            id: $inventory->getId(),
            product: new ProductResponse(
                id: $inventory->getProduct()->getId(),
                name: $inventory->getProduct()->getName(),
                description: $inventory->getProduct()->getDescription(),
                price: $inventory->getProduct()->getPrice(),
                category: new SharedCategoryResponse(
                    id: $inventory->getProduct()->getCategory()->getId(),
                    name: $inventory->getProduct()->getCategory()->getName()
                ),
                supplier: new SharedSupplierResponse(
                    id: $inventory->getProduct()->getSupplier()->getId(),
                    name: $inventory->getProduct()->getSupplier()->getName()
                ),
            ),
            stock: $inventory->getStock(),
        );
    }
}