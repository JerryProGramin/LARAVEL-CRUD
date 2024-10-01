<?php

declare(strict_types=1);

namespace Src\Category\Application\UseCase;

use Src\Category\Application\DTO\CategoryResponse;
use Src\Category\Domain\Repository\CategoryRepositoryInterface;

class CategoryShow
{
    public function __construct(
        private CategoryRepositoryInterface $categoryRepository,
    ) {}
    public function execute(int $id): CategoryResponse
    {
        $category = $this->categoryRepository->getShow($id);
        return new CategoryResponse(
            id: $category->getId(),
            name: $category->getName(),
            description: $category->getDescription()
        );
    }
}