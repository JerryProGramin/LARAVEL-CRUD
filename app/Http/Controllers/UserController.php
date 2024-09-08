<?php 

declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{   
    public function index(): JsonResponse
    {
        $users = User::all();
        return new JsonResponse($users);
    }

    public function show(User $user): JsonResponse
    {
        return new JsonResponse($user);
    }

    public function store(StoreUserRequest $request): JsonResponse
    {
        User::create([
            'email' => $request->email,
            'password' => $request->password,
        ]);
        return new JsonResponse(['message' => 'User registered successfully']);
    }

    public function update(User $user, Request $request): JsonResponse
    {
        $user->update([
            'email' => $request->email,
            'password' => $request->password,
        ]);
        return new JsonResponse(['message' => 'User update successfully']);
    }

    public function delete(User $user): JsonResponse
    {
        $user->delete();
        return new JsonResponse(['message' => 'User deleted successfully']);
    }
}   