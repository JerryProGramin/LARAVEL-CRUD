<?php 

declare(strict_types = 1);

namespace Src\Supplier\Domain\Repository;

use Src\Supplier\Domain\Model\Supplier;

interface SupplierRepositoryInterface 
{
    public function getAll(): array;
    public function getShow(int $id): ?Supplier;
    public function store(string $name, string $contactInfo, string $phone, string $email, string $address, string $country): ?Supplier;
    public function update(int $id, string $name, string $contactInfo, string $phone, string $email, string $address, string $country): ?Supplier;
    public function delete(int $id): void;
}