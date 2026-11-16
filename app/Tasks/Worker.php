<?php

declare(strict_types=1);

namespace App\Tasks;

final class Worker
{
    public function __construct(
        private readonly float $base,
        private readonly int $pCount,
        private readonly float $pp
    ) {
        if ($base < 0 || $pCount < 0 || $pp < 0
            || ! is_finite($base) || ! is_finite($pp)) {
            throw new \InvalidArgumentException(
                'Некоректні дані для зарплати'
            );
        }
    }

    public function calculateSalary(): float
    {
        return $this->base
            + ($this->pCount * 0.05 * $this->pp);
    }
}
