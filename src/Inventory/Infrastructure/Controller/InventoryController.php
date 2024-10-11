<?php 

declare(strict_types = 1);

namespace Src\Inventory\Infrastructure\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Src\Inventory\Application\UseCase\InventoriesShow;
use Src\Inventory\Application\UseCase\InventoryShow;

class InventoryController extends Controller
{
    public function __construct(
        private InventoriesShow $inventoriesShow,
        private InventoryShow $inventoryShow,
        // private InventoryUpdate $inventoryUpdate,
        // private InventoryDelete $inventoryDelete,
        // private InventoryRegister $inventoryRegister,
    ){}

    public function index(): JsonResponse
    {
        $inventories = $this->inventoriesShow->execute();
        return new JsonResponse($inventories);
    }

    public function show(int $id): JsonResponse
    {
        $inventory = $this->inventoryShow->execute($id);
        return new JsonResponse($inventory);
    }
}