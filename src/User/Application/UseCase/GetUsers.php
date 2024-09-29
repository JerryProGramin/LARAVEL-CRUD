<?php

declare(strict_types=1);

namespace Src\User\Application\UseCase;

use Src\User\Domain\Repository\UserRepositoryInterface;

class GetUsers
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(): array
    {
        return $this->userRepository->getAll();
    }
}
