<?php

declare(strict_types=1);

namespace Src\Supplier\Application\UseCase;

use Src\Supplier\Application\DTO\SupplierResponse;
use Src\Supplier\Domain\Repository\SupplierRepositoryInterface;

class SupplierShow
{
    public function __construct(
        private SupplierRepositoryInterface $supplierRepository,
    ) {}
    public function execute(int $id): SupplierResponse
    {
        $supplier = $this->supplierRepository->getShow($id);
        return new SupplierResponse(
            id: $supplier->getId(),
            name: $supplier->getName(),
            contactInfo: $supplier->getContactInfo(),
            phone: $supplier->getPhone(),
            email: $supplier->getEmail(),
            address: $supplier->getAddress(),
            country: $supplier->getCountry()
        );
    }
}
