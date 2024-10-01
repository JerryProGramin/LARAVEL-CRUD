<?php

declare(strict_types=1);

namespace Src\Category\Infrastructure\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Src\Category\Application\UseCase\CategoriesShow;
use Src\Category\Application\UseCase\CategoryShow;

class CategoryController extends Controller
{
    public function __construct(
        private CategoriesShow $categories,
        private CategoryShow $category
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
    
}