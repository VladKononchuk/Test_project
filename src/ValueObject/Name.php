<?php

declare(strict_types=1);

namespace App\ValueObject;

final readonly class Name
{
    public function __construct(
        public string $value,
    ) {
        if (empty($this->value)) {
            throw new \InvalidArgumentException('Name field is empty');
        }
    }
}