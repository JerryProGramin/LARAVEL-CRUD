<?php 

declare(strict_types = 1);

namespace Src\Inventory\Application\UseCase;

use Src\Category\Application\DTO\CategoryResponse;
use Src\Inventory\Application\DTO\InventoryResponse;
use Src\Inventory\Domain\Repository\InventoryRepositoryInterface;
use Src\Product\Application\DTO\ProductResponse;
use Src\Supplier\Application\DTO\SupplierResponse;

class InventoriesShow
{
    public function __construct(
        private InventoryRepositoryInterface $inventoryRepository
    ) {}

    public function execute(): array
    {
        $inventoriesShow = $this->inventoryRepository->getAll();

        return array_map(function ($inventories){
            return new InventoryResponse(
                id: $inventories->getId(),
                product: new ProductResponse(
                    id: $inventories->getProduct()->getId(),
                    name: $inventories->getProduct()->getName(),
                    description: $inventories->getProduct()->getDescription(),
                    price: $inventories->getProduct()->getPrice(),
                    category: new CategoryResponse(
                        id: $inventories->getProduct()->getCategory()->getId(),
                        name: $inventories->getProduct()->getCategory()->getName()
                    ),
                    supplier: new SupplierResponse(
                        id: $inventories->getProduct()->getSupplier()->getId(),
                        name: $inventories->getProduct()->getSupplier()->getName()
                    ),
                ),
                stock: $inventories->getStock()
            );
        }, $inventoriesShow);
    }
}