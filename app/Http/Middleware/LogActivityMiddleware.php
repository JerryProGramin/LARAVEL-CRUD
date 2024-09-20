<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class LogActivityMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if (Auth::check()) {
            $user = Auth::user();
            $action = $request->method() . ' ' . $request->path(); 
            $ipAddress = $request->ip(); 
            $userAgent = $request->header('User-Agent'); 
            $timestamp = Carbon::now()->toDateTimeString();

            DB::table('log_activities')->insert([
                'user_id' => $user->id,
                'action' => $action,
                'ip_address' => $ipAddress,
                'user_agent' => $userAgent,
                'created_at' => $timestamp,
            ]);
        }

        return $response;
    }
}
