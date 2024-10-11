<?php

declare(strict_types=1);

namespace Src\Category\Application\UseCase;

use App\Http\Requests\Category\StoreCategoryRequest;
use Src\Category\Domain\Repository\CategoryRepositoryInterface;

class CategoryUpdate 
{
    public function __construct(
        private CategoryRepositoryInterface $categoryRepository,
    ) {}

    public function execute(int $id, StoreCategoryRequest $request): void
    {
        $this->categoryRepository->update($id, $request->name, $request->description);
    }
    
}