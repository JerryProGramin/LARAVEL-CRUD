<?php

namespace App\Http\Middleware;

use App\Enums\RoleEnum;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ?string $role = null): Response
    {
        $user = Auth::user();
        if (!$user || !$user->profile || !$user->profile->role) return response()->json(['message' => 'No autorizado. No hay rol asignado.'], 403);
        $userRole = $user->profile->role->name;
        if (!$this->checkRole($userRole, $role)) return response()->json(['message' => 'Permisos insuficientes'], 403);
        
        return $next($request);
    }

    protected function checkRole(string $userRole, string $requiredRole): bool
    {
        switch ($requiredRole) {
            case RoleEnum::ADMIN->value:
                return $userRole === RoleEnum::ADMIN->value;
            case RoleEnum::EMPLOYEE->value:
                return $userRole === RoleEnum::EMPLOYEE->value || $userRole === RoleEnum::ADMIN->value;
            case RoleEnum::CLIENT->value:
                return $userRole === RoleEnum::CLIENT->value || $userRole === RoleEnum::EMPLOYEE->value || $userRole === RoleEnum::ADMIN->value;
            default:
                return false;
        }
    }
}
