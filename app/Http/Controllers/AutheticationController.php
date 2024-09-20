<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Firebase\JWT\JWT;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AutheticationController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        $user = User::where('email', $request->email)->first();

        if(!$user){
            return new JsonResponse(['message' => "El Email {$request->email} no fue encontrado"], Response::HTTP_NOT_FOUND);
        }
        
        if (!Hash::check($request->password, $user->password)) {
            throw new Exception('Invalid password', 401);
        }

        $expiration = time() + 300; 

        $payload = [
            'sub' => $user->id,
            'iat' => time(),
            'exp' => $expiration,
        ];
        
        $token = JWT::encode($payload, config('services.JWT.key'), 'HS256');
        return new JsonResponse(['message' => 'session started successfully', 'token' => $token]);
    }
}
