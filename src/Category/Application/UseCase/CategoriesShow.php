<?php

declare(strict_types=1);

namespace Src\Category\Application\UseCase;

use Src\Category\Application\DTO\CategoryResponse;
use Src\Category\Domain\Repository\CategoryRepositoryInterface;

class CategoriesShow 
{
    public function __construct(
        private CategoryRepositoryInterface  $categories,
    ) {}
    
    public function execute(): array
    {
        $categoriesShow = $this->categories->getAll();

        return array_map(function ($category) {
            return new CategoryResponse(
                id: $category->getId(),
                name: $category->getName(),
                description: $category->getDescription()
            );
        }, $categoriesShow);
    }
}