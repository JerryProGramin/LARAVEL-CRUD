<?php 

declare(strict_types = 1);

namespace Src\Supplier\Infrastructure\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Src\Supplier\Application\UseCase\SupplierShow;
use Src\Supplier\Application\UseCase\SuppliersShow;

class SupplierController extends Controller
{
    public function __construct(
        private SuppliersShow $suppliersShow,
        private SupplierShow $supplierShow
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
}