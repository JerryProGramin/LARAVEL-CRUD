<?php

declare(strict_types=1);

namespace Src\PaymentMethod\Application\DTO;

use DateTime;
use Src\PaymentMethod\Domain\Model\PaymentMethod;
use Src\User\Domain\Model\User;

class PaymentMethodResponse
{
    public function __construct(
        public int $id,
        public string $name,
        public ?string $details = ''
    ) {}
}
