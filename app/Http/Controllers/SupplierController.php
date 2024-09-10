<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Supplier\StoreSupplierRequest;
use App\Http\Resources\SupplierResource;
use App\Models\Supplier;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index(): JsonResponse
    {
        $suppliers = Supplier::all();
        return new JsonResponse(SupplierResource::collection($suppliers));
    }
    public function show(Supplier $supplier): JsonResponse
    {
        return response()->json(new SupplierResource($supplier));
    }

    public function store(StoreSupplierRequest $request): JsonResponse
    {
        Supplier::create([
            'name' => $request->name,
            'contact_info' => $request->contact_info,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'country' => $request->country,
        ]);
        return new JsonResponse(['message' => 'Supplier registered successfully']);
    }

    public function update(Supplier $supplier, Request $request): JsonResponse
    {
        $supplier->update([
            'name' => $request->name,
            'contact_info' => $request->contact_info,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'country' => $request->country,
        ]);
        return new JsonResponse(['message' => 'Supplier updated successfully']);
    }

    public function delete(Supplier $supplier): JsonResponse
    {
        $supplier->delete();
        return new JsonResponse(['message' => 'Supplier deleted successfully']);
    }
}
