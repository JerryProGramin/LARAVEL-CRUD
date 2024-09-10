<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\StoreProfileRequest;
use App\Http\Resources\ProfileResource;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ProfileController extends Controller
{
    public function index(): JsonResponse
    {
        $profiles = Profile::with('user')->get();
        return new JsonResponse(ProfileResource::collection($profiles));
    }
    public function show(Profile $profile): JsonResponse
    {
        $profile = Profile::with('user')->findOrFail($profile->id);
        return response()->json(new ProfileResource($profile));
    }

    public function store(StoreProfileRequest $request): JsonResponse
    {
        Profile::create([
            'user_id' => $request-> user_id,
            'name' => $request->name,
            'last_name' => $request->last_name,
            'name_user' => $request->name_user,
            'dni' => $request->dni,
        ]);
        return new JsonResponse(['message' => 'Profile registered successfully']);
    }

    public function update(Profile $profile, Request $request): JsonResponse
    {
        $profile->update([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'last_name' => $request->last_name,
            'name_user' => $request->name_user,
            'dni' => $request->dni,
        ]);
        return new JsonResponse(['message' => 'Profile updated successfully']);
    }

    public function delete(Profile $profile): JsonResponse
    {
        $profile->delete();
        return new JsonResponse(['message' => 'Profile deleted successfully']);
    }
}
