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

    public function store(string $name, string $description): Category
    {
        $category = new AppCategory();
        $category->name = $name;
        $category->description = $description;
        $category->save();
        
        return new Category(
            $category->id,
            $category->name,
            $category->description
        );
    }

    public function update(int $id, string $name, string $description): Category
    {
        $category = AppCategory::find($id);
        
        if (!$category) {
            throw new \Exception("Category not found.");
        }
        
        $category->name = $name;
        $category->description = $description;
        $category->save();
        
        return new Category(
            $category->id,
            $category->name,
            $category->description
        );
    }
    
    public function delete(int $id): void
    {
        AppCategory::destroy($id);
    }
    
}