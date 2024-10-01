<?php 

declare(strict_types = 1);

namespace Src\Product\Domain\Model;

use Src\Category\Domain\Model\Category;
use Src\Supplier\Domain\Model\Supplier;

class Product
{
    public function __construct(
        private int $id,
        private string $name,
        private string $description,
        private float $price,
        private Category $category_id,
        private Supplier $supplier_id
    ){}

    public function getId(): int { return $this->id;}
    public function getName(): string { return $this->name;}
    public function getDescription(): string { return $this->description;}
    public function getPrice(): float { return $this->price;}
    public function getCategoryId(): Category { return $this->category_id;}
    public function getSupplierId(): Supplier { return $this->supplier_id;}
}