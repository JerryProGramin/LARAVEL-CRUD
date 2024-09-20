<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Role\StoreRoleRequest;
use App\Http\Resources\RoleResource;
use App\Models\Role;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(): JsonResponse
    {
        $roles = Role::all();
        return new JsonResponse(RoleResource::collection($roles));
    }

    public function show(Role $role): JsonResponse
    {
        return new JsonResponse($role);
    }

    public function store(StoreRoleRequest $request): JsonResponse
    {
        Role::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return new JsonResponse(['message' => 'Role registered successfully']);
    }

    public function update(Role $role, Request $request): JsonResponse
    {
        $role->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return new JsonResponse(['message' => 'Role updated successfully']);
    }

    public function delete(Role $role): JsonResponse
    {
        $role->delete();
        return new JsonResponse(['message' => 'Role deleted successfully']);
    } 
}
