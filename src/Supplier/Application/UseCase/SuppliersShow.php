<?php

declare(strict_types=1);

namespace Src\Supplier\Application\UseCase;

use Src\Supplier\Application\DTO\SupplierResponse;
use Src\Supplier\Domain\Repository\SupplierRepositoryInterface;

class SuppliersShow
{
    public function __construct(
        private SupplierRepositoryInterface  $suppliers,
    ) {}

    public function execute(): array
    {
        $suppliersShow = $this->suppliers->getAll();

        return array_map(function ($supplier) {
            return new SupplierResponse(
                id: $supplier->getId(),
                name: $supplier->getName(),
                contactInfo: $supplier->getContactInfo(),
                phone: $supplier->getPhone(),
                email: $supplier->getEmail(),
                address: $supplier->getAddress(),
                country: $supplier->getCountry()
            );
        }, $suppliersShow);
    }
}
