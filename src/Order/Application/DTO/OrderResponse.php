<?php 

declare(strict_types = 1);

namespace Src\Order\Application\DTO;

use DateTime;
use Src\PaymentMethod\Application\DTO\PaymentMethodResponse;
use Src\User\Application\DTO\UserResponse;

class OrderResponse
{
    public function __construct(
        public int $id,
        public UserResponse $user,
        public DateTime $date,
        public PaymentMethodResponse $paymentMethod,
        public float $total,
        public string $orderNumber,
    ){}
}