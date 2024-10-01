<?php

declare(strict_types=1);

namespace Src\Category\Application\DTO;

class CategoryRequest
{
    public function __construct(
        public string $name,
        public string $description
    ) {}
}