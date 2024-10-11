<?php

declare(strict_types = 1);

namespace Src\Order\Domain\Repository;

use Src\Order\Domain\Model\Order;

interface OrderRepositoryInterface
{
    public function getAll(): array;
    public function getShow(int $id): Order;
}