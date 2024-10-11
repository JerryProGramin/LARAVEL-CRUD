<?php 

declare(strict_types = 1);

namespace Src\Supplier\Application\UseCase;

use Src\Supplier\Domain\Repository\SupplierRepositoryInterface;

class SupplierDelete
{
    public function __construct(
        private SupplierRepositoryInterface $supplierRepository,
    ){}

    public function execute(int $id): void
    {
        $this->supplierRepository->delete($id);
    }
}