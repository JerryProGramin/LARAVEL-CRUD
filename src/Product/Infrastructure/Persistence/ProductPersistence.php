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

    public function store(string $name, string $description, float $price, int $categoryId, int $supplierId): Product
    {
        $appProduct = new AppProduct();
        $appProduct->name = $name;
        $appProduct->description = $description;
        $appProduct->price = $price;
        $appProduct->category_id = $categoryId;
        $appProduct->supplier_id = $supplierId;
        $appProduct->save();
        return new Product(
            $appProduct->id,
            $appProduct->name,
            $appProduct->description,
            (float) $appProduct->price,
            $appProduct->categoryId,
            $appProduct->supplierId,
        );
    }

    public function update(int $id, string $name, string $description, float $price, int $categoryId, int $supplierId): Product
    {
        $product = AppProduct::find($id);
        if (!$product) {
            throw new \Exception("Product not found.");
        }
        $product->name = $name;
        $product->description = $description;
        $product->price = $price;
        $product->category_id = $categoryId;
        $product->supplier_id = $supplierId;
        $product->save();
        return new Product(
            $product->id,
            $product->name,
            $product->description,
            (float) $product->price,
            $product->categoryId,
            $product->supplierId,
        );
    }
    
    public function delete(int $id): void
    {
        AppProduct::destroy($id);
    }
}
