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

    public function store(string $name, string $contactInfo, string $phone, string $email, string $address, string $country): ?Supplier
    {
        $supplier = new AppSupplier();
        $supplier->name = $name;
        $supplier->contact_info = $contactInfo;
        $supplier->phone = $phone;
        $supplier->email = $email;
        $supplier->address = $address;
        $supplier->country = $country;
        $supplier->save();

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

    public function update(int $id, string $name, string $contactInfo, string $phone, string $email, string $address, string $country): Supplier
    {
        $supplier = AppSupplier::find($id);

        if (!$supplier) {
            throw new \Exception("Supplier not found.");
        }
        $supplier->name = $name;
        $supplier->contact_info = $contactInfo;
        $supplier->phone = $phone;
        $supplier->email = $email;
        $supplier->address = $address;
        $supplier->country = $country;
        $supplier->save();

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

    public function delete(int $id): void
    {
        AppSupplier::destroy($id);
    }
}
