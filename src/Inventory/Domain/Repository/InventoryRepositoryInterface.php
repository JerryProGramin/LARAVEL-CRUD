<?php

declare(strict_types = 1);

namespace Src\Inventory\Domain\Repository;

use Src\Inventory\Domain\Model\Inventory;
use Src\Product\Domain\Model\Product;

interface InventoryRepositoryInterface
{
    public function getAll(): array;
    public function getShow(int $id): ?Inventory;
    public function store(Product $productId,int $stock): ?Inventory;
    public function update(int $id, Product $productId, int $stock): ?Inventory;
    public function delete(int $id): void;
}