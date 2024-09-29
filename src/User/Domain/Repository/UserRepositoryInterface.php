<?php

declare(strict_types=1);

namespace Src\User\Domain\Repository;

use Src\User\Domain\Model\User;

interface UserRepositoryInterface
{
    /**
     * Summary of getAll
     * @return User[]  Array of User objects
     */
    public function getAll(): array;
    
}
