<?php 

declare(strict_types = 1);

namespace Src\Order\Domain\Model;

use DateTime;
use Src\PaymentMethod\Domain\Model\PaymentMethod;
use Src\User\Domain\Model\User;

class Order
{
    public function __construct(
        private int $id,
        private User $user,
        private DateTime $date,
        private PaymentMethod $paymentMethod,
        private float $total,
        private string $orderNumber
    ){}

    public function getId(): int { return $this->id;}
    public function getUser(): User { return $this->user;}
    public function getDate(): DateTime { return $this->date;}
    public function getPaymentMethod(): PaymentMethod { return $this->paymentMethod;}
    public function getTotal(): float { return $this->total;}
    public function getOrderNumber(): string { return $this->orderNumber;}
}