<?php

declare(strict_types=1);

namespace Src\Inventory\Application\UseCase;

//use App\Http\Requests\Inventory\StoreInventoryRequest;
use Src\Inventory\Domain\Repository\InventoryRepositoryInterface;

class InventoryUpdate
{
    public function __construct(
        private InventoryRepositoryInterface $inventoryRepository,
    ) {}

    // public function execute(int $id, StoreInventoryRequest $request): void
    // {
    //     $this->inventoryRepository->update($id, $request->name, $request->description);
    // }
    
}