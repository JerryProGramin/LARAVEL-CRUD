<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\InventoryResource;
use App\Models\Inventory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class InventaryController extends Controller
{
    public function index(): JsonResponse
    {
        $inventories = Inventory::all();
        return new JsonResponse(InventoryResource::collection($inventories));
    }
}
