<?php

declare(strict_types=1);

namespace App\Tasks;

class Car extends Vehicle
{
    public function __construct(float $speed = 60.0)
    {
        parent::__construct($speed);
    }

    public function calculateTravelTime(float $distance): float
    {
        if (! is_finite($distance) || $distance < 0) {
            throw new \InvalidArgumentException(
                'Відстань не може бути від’ємною'
            );
        }

        return $distance / $this->speed;
    }
}
