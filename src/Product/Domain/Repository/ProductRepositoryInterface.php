<?php 

declare(strict_types = 1);

namespace Src\Product\Domain\Repository;

use Src\Product\Domain\Model\Product;

interface ProductRepositoryInterface
{
    public function getAll(): array;
    public function getShow(int $id): Product;
    public function store(string $name, string $description, float $price, int $categoryId, int $supplierId): Product;
    public function update(int $id,string $name, string $description, float $price, int $categoryId, int $supplierId): Product;
    public function delete(int $id): void;
}