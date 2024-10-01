<?php

declare(strict_types=1);

namespace Src\Category\Infrastructure\Persistence;

use App\Models\Category as AppCategory;
use Src\Category\Domain\Model\Category;
use Src\Category\Domain\Repository\CategoryRepositoryInterface;

class CategoryPersistence implements CategoryRepositoryInterface
{

    public function getAll(): array
    {
        $categories = AppCategory::all();
        return $categories->map(function($category){
            return new Category(
                $category->id,
                $category->name,
                $category->description
            );
        })->toArray();
    }

    public function getShow(int $id): Category
    {
        $category = AppCategory::find($id);

        if (!$category) {
            throw new \Exception("Category not found.");
        }

        return new Category(
            $category->id,
            $category->name,
            $category->description
        );
    }
    
}