<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Authetication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->header('Authorization');

        if (!$token) {
            return response()->json(['message' => 'Token not provided']);
        }
        
        $decoded = JWT::decode($token, new Key(config('services.JWT.key'), 'HS256'));
        $user = User::find($decoded->sub);

        if (!$user) {
            throw new Exception('Invalid Credentials', 401);
        }

        Auth::login($user);

        return $next($request);
    }
    
}
