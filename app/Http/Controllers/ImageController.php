<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\image;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Services\Image\ImageService;


class ImageController extends Controller
{

    public function __construct(
        private ImageService $imageService
    ){
        $this->imageService = $imageService;
    }

    public function saveUser(Request $request, User $user)
    {
        return Image::create([
            'imageable_type' => User::class,
            'imageable_id' => $user->id,
            'uri' => $request->file('public')->store('user', 'public')
        ]);
    }


    public function saveBase64User(Request $request, User $user): JsonResponse
    {
        $path = $this->imageService->saveBase64Image($request->images_base64, 'user');
        $image = Image::create([
            'imageable_type' => User::class,
            'imageable_id' => $user->id,
            'uri' => $path
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Imagen de usuario guardada correctamente',
            'image' => $image
        ], 201);
    }

    public function getUser(User $user)
    {
        $photo = $user->images;
        return new JsonResponse($photo);
    }

    public function saveProduct(Request $request, Product $product)
    {
        return Image::create([
            'imageable_type' => Product::class,
            'imageable_id' => $product->id,
            'uri' => $request->file('public')->store('product', 'public')
        ]);
    }


    public function saveBase64Product(Request $request, Product $product): JsonResponse
    {
        $path = $this->imageService->saveBase64Image($request->images_base64, 'product');
        $image = Image::create([
            'imageable_type' => Product::class,
            'imageable_id' => $product->id,
            'uri' => $path
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Imagen de producto guardada correctamente',
            'image' => $image
        ], 201);
    }

    public function getProduct(Product $product)
    {
        $photo = $product->images;
        return new JsonResponse($photo);
    }
}
