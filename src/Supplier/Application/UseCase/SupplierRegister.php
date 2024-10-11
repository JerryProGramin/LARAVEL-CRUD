<?php 

declare(strict_types = 1);

namespace Src\Supplier\Application\UseCase;

use App\Http\Requests\Supplier\StoreSupplierRequest;
use Src\Supplier\Domain\Repository\SupplierRepositoryInterface;

class SupplierRegister 
{
    public function __construct(
        private SupplierRepositoryInterface $supplierRepository,
    ){}

    public function execute(StoreSupplierRequest $request)
    {
        $this->supplierRepository->store(
            $request->name,
            $request->contactInfo,
            $request->phone,
            $request->email,
            $request->address,
            $request->country
        );
    }
}