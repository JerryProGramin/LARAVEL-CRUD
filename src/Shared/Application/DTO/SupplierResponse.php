<?php

declare(strict_types=1);

namespace Src\Shared\Application\DTO;

class SupplierResponse
{
    public function __construct(
        public int $id,
        public string $name,
    ) {}
}
