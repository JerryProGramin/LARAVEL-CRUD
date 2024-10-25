<?php

declare(strict_types=1);

namespace Src\Product\Application\UseCase;

use App\Http\Requests\Product\StoreProductRequest;
use Src\Product\Domain\Repository\ProductRepositoryInterface;

class ProductUpdate
{
    public function __construct(
        private ProductRepositoryInterface $productRepository,
    ) {}

    public function execute(int $id, StoreProductRequest $request): void
    {
        $this->productRepository->update(
            $id, $request->name, 
            $request->description,
            $request->price,
            $request->category_id,
            $request->supplier_id,
        );
    }
}
