<?php

declare(strict_types=1);

namespace Src\Product\Application\UseCase;

use Src\Product\Domain\Repository\ProductRepositoryInterface;

class ProductDelete
{
    public function __construct(
        private ProductRepositoryInterface $product,
    ) {}

    public function execute(int $id): void
    {
        $this->product->delete($id);
    }
}
