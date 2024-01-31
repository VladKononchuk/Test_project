<?php

declare(strict_types=1);

namespace App\ValueObject;

final readonly class Description
{
    public function __construct(
        public string $value,
    ) {
        if (empty($this->value)) {
            throw new \InvalidArgumentException('Description field is empty');
        }
    }
}