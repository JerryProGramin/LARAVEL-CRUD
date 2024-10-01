<?php

declare(strict_types=1);

namespace Src\Supplier\Infrastructure\Persistence;

use App\Models\Supplier as AppSupplier;
use Src\Supplier\Domain\Model\Supplier;
use Src\Supplier\Domain\Repository\SupplierRepositoryInterface;

class SupplierPersistence implements SupplierRepositoryInterface
{

    public function getAll(): array
    {
        $suppliers = AppSupplier::all();
        return $suppliers->map(function ($supplier) {
            return new Supplier(
                id: $supplier->id,
                name: $supplier->name,
                contact_info: $supplier->contact_info,
                phone: $supplier->phone,
                email: $supplier->email,
                address: $supplier->address,
                country: $supplier->country
            );
        })->toArray();
    }

    public function getShow(int $id): Supplier
    {
        $supplier = AppSupplier::find($id);

        if (!$supplier) {
            throw new \Exception("Supplier not found.");
        }

        return new Supplier(
            id: $supplier->id,
            name: $supplier->name,
            contact_info: $supplier->contact_info,
            phone: $supplier->phone,
            email: $supplier->email,
            address: $supplier->address,
            country: $supplier->country
        );
    }
}
