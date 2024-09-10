<?php

namespace App\Http\Middleware;

use App\Models\Product;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $productId = $request->route('product.id');
        $product = Product::find($productId);
        if (!$product) {
            return response()->json(['error' => 'Producto no encontrado.'], 404);
        }
        if ($product->stock == 0) {
            return response()->json(['error' => 'No hay stock del producto.'], 400);
        }
        return $next($request);
    }
}
