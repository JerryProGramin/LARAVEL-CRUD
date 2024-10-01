<?php

declare(strict_types=1);

namespace Src\Category\Application\UseCase;

use Src\Category\Domain\Model\CategoryRepositoryInterface;

class CategoryDelete 
{
    public function __construct(
        private CategoryRepositoryInterface $category,
    ) {}

    public function execute(int $id): void
    {
        $this->category->delete($id);
    }
}