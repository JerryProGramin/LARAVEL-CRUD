<?php

declare(strict_types=1);

namespace Src\Product\Application\UseCase;

use App\Http\Requests\Product\StoreProductRequest;
use Src\Product\Domain\Repository\ProductRepositoryInterface;

class ProductRegister
{
    public function __construct(
        private ProductRepositoryInterface $productRepository
    ) {}

    public function execute(StoreProductRequest $request): void
    {
        $this->productRepository->store(
            $request->name,
            $request->description,
            $request->price,
            $request->categoryId,
            $request->supplierId
        );
    }
}
