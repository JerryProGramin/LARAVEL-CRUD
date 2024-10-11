<?php 

declare(strict_types = 1);

namespace Src\OrderProduct\Domain\Repository;

use Src\OrderProduct\Domain\Model\OrderProduct;

interface OrderProductRepository
{
    public function getAll(): array;
    public function getShow(int $id): OrderProduct;
}