<?php

declare(strict_types=1);

namespace Src\Product\Infrastructure\Persistence;

use App\Models\Product as AppProduct;
use Src\Category\Domain\Model\Category;
use Src\Product\Domain\Model\Product;
use Src\Product\Domain\Repository\ProductRepositoryInterface;
use Src\Supplier\Domain\Model\Supplier;

class ProductPersistence implements ProductRepositoryInterface
{

    public function getAll(): array
    {
        $products = AppProduct::all();
        return $products->map(function ($product) {
            return new Product(
                $product->id,
                $product->name,
                $product->description,
                (float) $product->price,
                new Category(
                    $product->category->id,
                    $product->category->name,
                ),
                new Supplier(
                    $product->supplier->id,
                    $product->supplier->name,
                ),
            );
        })->toArray();
    }

    public function getShow(int $id): Product
    {
        $product = AppProduct::find($id);

        if (!$product) {
            throw new \Exception("Category not found.");
        }

        return new Product(
            $product->id,
            $product->name,
            $product->description,
            (float) $product->price,
            new Category(
                $product->category->id,
                $product->category->name,
            ),
            new Supplier(
                $product->supplier->id,
                $product->supplier->name,
            ),
        );
    }
}
