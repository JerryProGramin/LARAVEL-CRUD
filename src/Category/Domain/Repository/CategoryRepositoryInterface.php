<?php

declare(strict_types=1);

namespace Src\Category\Domain\Repository;

use Src\Category\Domain\Model\Category;

interface CategoryRepositoryInterface
{
    public function getAll(): array;
    public function getShow(int $id): ?Category;
    public function store(string $name, string $description): ?Category;
    public function update(int $id, string $name, string $description): ?Category;
    public function delete(int $id): void;
}