<?php

declare(strict_types=1);

namespace App\Tasks;

abstract class Vehicle
{
    public function __construct(
        protected float $speed
    ) {
        if (! is_finite($speed) || $speed <= 0) {
            throw new \InvalidArgumentException(
                'Швидкість повинна бути додатною'
            );
        }
    }

    abstract public function calculateTravelTime(
        float $distance
    ): float;
}
