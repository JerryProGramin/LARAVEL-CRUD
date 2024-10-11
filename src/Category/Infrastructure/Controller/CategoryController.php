<?php

declare(strict_types=1);

namespace Src\Category\Infrastructure\Controller;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;
use Illuminate\Http\JsonResponse;
use Src\Category\Application\UseCase\CategoriesShow;
use Src\Category\Application\UseCase\CategoryDelete;
use Src\Category\Application\UseCase\CategoryRegister;
use Src\Category\Application\UseCase\CategoryShow;
use Src\Category\Application\UseCase\CategoryUpdate;

class CategoryController extends Controller
{
    public function __construct(
        private CategoriesShow $categories,
        private CategoryShow $category,
        private CategoryRegister $categoryRegister,
        private CategoryUpdate $categoryUpdate,
        private CategoryDelete $categoryDelete
    ){}

    public function index(): JsonResponse
    {
        $getCategories = $this->categories->execute();
        return new JsonResponse($getCategories);
    }
    
    public function show(int $id): JsonResponse
    {
        $getCategory = $this->category->execute($id);
        return new JsonResponse($getCategory);
    }
    
    public function destroy(int $id): JsonResponse
    {
        $this->categoryDelete->execute($id);
        return response()->json(['message' => 'Category deleted successfully']);
    }

    public function update(int $id, StoreCategoryRequest $request): JsonResponse
    {
        $this->categoryUpdate->execute($id, $request);
        return response()->json(['message' => 'Category updated successfully']);
    }

    public function store(StoreCategoryRequest $request): JsonResponse
    {
        $this->categoryRegister->execute($request);
        return response()->json(['message' => 'Category created successfully']);
    }
}