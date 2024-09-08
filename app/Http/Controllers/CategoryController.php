<?php

declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    public function index(): JsonResponse
    {
        $categories = Category::all();
        return new JsonResponse($categories);
    }

    public function show(Category $category): JsonResponse
    {
        return new JsonResponse($category);
    }

    public function store(StoreCategoryRequest $request): JsonResponse
    {
        Category::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return new JsonResponse(['message' => 'Category registered successfully']);
    }

    public function update(Category $category, Request $request): JsonResponse
    {
        $category->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return new JsonResponse(['message' => 'Category updated successfully']);
    }

    public function delete(Category $category): JsonResponse
    {
        $category->delete();
        return new JsonResponse(['message' => 'Category deleted successfully']);
    }
}
