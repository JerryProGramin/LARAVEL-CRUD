<?php 

declare(strict_types = 1);

namespace Src\Supplier\Domain\Repository;

use Src\Supplier\Domain\Model\Supplier;

interface SupplierRepositoryInterface 
{
    public function getAll(): array;
    public function getShow(int $id): Supplier;
    // public function store($data): Supplier;
    // public function update($id, $data): Supplier;
    // public function delete($id): void;
}