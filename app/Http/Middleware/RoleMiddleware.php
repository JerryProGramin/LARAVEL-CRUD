<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        $user = Auth::user();

        if (!$user || !$user->profile || !$user->profile->role) {
            return response()->json(['message' => 'Unauthorized. No role assigned.'], Response::HTTP_UNAUTHORIZED);
        }
        
        $userRole = $user->profile->role->name;

        if ($userRole !== $role) {
            return response()->json(['message' => 'Forbidden: Insufficient permissions.'], Response::HTTP_FORBIDDEN);
        }

        return $next($request);
    }
}
