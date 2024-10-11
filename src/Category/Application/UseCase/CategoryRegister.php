<?php

declare(strict_types=1);

namespace Src\Category\Application\UseCase;

use App\Http\Requests\Category\StoreCategoryRequest;
use Src\Category\Domain\Repository\CategoryRepositoryInterface;

class CategoryRegister 
{
    public function __construct(
        private CategoryRepositoryInterface $categoryRepository
    ){}

    public function execute(StoreCategoryRequest $request): void
    {
        $this->categoryRepository->store(
            $request->name, 
            $request->description
        );
    }
}