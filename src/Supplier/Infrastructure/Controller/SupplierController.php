<?php 

declare(strict_types = 1);

namespace Src\Supplier\Infrastructure\Controller;

use App\Http\Controllers\Controller;
use App\Http\Requests\Supplier\StoreSupplierRequest;
use Illuminate\Http\JsonResponse;
use Src\Supplier\Application\UseCase\SupplierDelete;
use Src\Supplier\Application\UseCase\SupplierRegister;
use Src\Supplier\Application\UseCase\SupplierShow;
use Src\Supplier\Application\UseCase\SuppliersShow;
use Src\Supplier\Application\UseCase\SupplierUpdate;

class SupplierController extends Controller
{
    public function __construct(
        private SuppliersShow $suppliersShow,
        private SupplierShow $supplierShow,
        private SupplierRegister $supplierRegister,
        private SupplierUpdate $supplierUpdate,
        private SupplierDelete $supplierDelete
    ){}

    public function index(): JsonResponse
    {
        $suppliers = $this->suppliersShow->execute();
        return response()->json($suppliers);
    }

    public function show(int $id): JsonResponse
    {
        $supplier = $this->supplierShow->execute($id);
        return response()->json($supplier);
    }

    public function store(StoreSupplierRequest $request): JsonResponse
    {
        $this->supplierRegister->execute($request);
        return response()->json(['message' => 'Supplier created successfully'], 201);
    }
    
    public function update(int $id, StoreSupplierRequest $request): JsonResponse
    {
        $this->supplierUpdate->execute($id, $request);
        return response()->json(['message' => 'Supplier updated successfully']);
    }

    public function delete(int $id): JsonResponse
    {
        $this->supplierDelete->execute($id);
        return response()->json(['message' => 'Supplier deleted successfully']);
    }
}