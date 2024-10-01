<?php 

declare(strict_types = 1);

namespace Src\Product\Domain\Repository;

use Src\Product\Domain\Model\Product;

interface ProductRepositoryInterface
{
    public function getAll(): array;
    public function getShow(int $id): Product;
    // public function store($data): Product;
    // public function update($id, $data): Product;
    // public function delete($id): void;
}