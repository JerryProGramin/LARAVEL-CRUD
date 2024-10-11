<?php

declare(strict_types=1);

namespace Src\Inventory\Infrastructure\Persistence;

use App\Models\Inventory as AppInventory;
use Src\Category\Domain\Model\Category;
use Src\Inventory\Domain\Model\Inventory;
use Src\Inventory\Domain\Repository\InventoryRepositoryInterface;
use Src\Product\Domain\Model\Product;
use Src\Supplier\Domain\Model\Supplier;

class InventoryPersistence implements InventoryRepositoryInterface
{
    public function getAll(): array
    {
        $inventories = AppInventory::all();
        return $inventories->map(function ($inventories){
            return new Inventory(
                $inventories->id,
                new Product(
                    $inventories->product->id,
                    $inventories->product->name,
                    $inventories->product->description,
                    (float)$inventories->product->price,
                    new Category(
                        $inventories->product->category->id,
                        $inventories->product->category->name,
                    ),
                    new Supplier(
                        $inventories->product->supplier->id,
                        $inventories->product->supplier->name,
                    ),
                ),
                $inventories->stock,
            );
        })->toArray();
    }

    public function getShow(int $id): Inventory
    {
        $inventory = AppInventory::find($id);
        if (!$inventory) {
            throw new \Exception("Inventory not found.");
        }
        return new Inventory(
            $inventory->id,
            new Product(
                $inventory->product->id,
                $inventory->product->name,
                $inventory->product->description,
                (float)$inventory->product->price,
                new Category(
                    $inventory->product->category->id,
                    $inventory->product->category->name,
                    ),
                new Supplier(
                    $inventory->product->supplier->id,
                    $inventory->product->supplier->name,
                ),
            ),
            $inventory->stock,
        );
    }

    public function store(Product $product, int $stock): Inventory
    {
        $inventory = new AppInventory();
        $inventory->product_id = $product->getId();
        $inventory->stock = $stock;
        $inventory->save();
        return new Inventory(
            $inventory->id,
            $product,
            $inventory->stock,
        );
    }

    public function update(int $id, Product $product, int $stock): Inventory
    {
        $inventory = AppInventory::find($id);
        if (!$inventory) {
            throw new \Exception("Inventory not found.");
        }
        $inventory->product_id = $product->getId();
        $inventory->stock = $stock;
        $inventory->save();
        return new Inventory(
            $inventory->id,
            $product,
            $inventory->stock,
        );
    }

    public function delete(int $id): void
    {
        AppInventory::destroy($id);
    }
}