<?php 

declare(strict_types = 1);

namespace Src\PaymentMethod\Domain\Model;

class PaymentMethod
{
    public function __construct(
        private int $id,
        private string $name,
        private ?string $details = ''
    ){}

    public function getId(): int { return $this->id;}
    public function getName(): string { return $this->name;}
    public function getDetails():?string { return $this->details;}
}