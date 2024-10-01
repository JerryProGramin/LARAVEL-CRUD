<?php

declare(strict_types=1);

namespace Src\User\Infrastructure\Persistence;

use Src\User\Domain\Repository\UserRepositoryInterface;
use Src\User\Domain\Model\User;

class MySQLUserRepository implements UserRepositoryInterface
{
    public function getAll(): array
    {
        return User::select('id', 'email')->get()->toArray();
    }

    
}
