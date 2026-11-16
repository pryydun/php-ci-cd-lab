<?php

declare(strict_types=1);

namespace App\Tasks;

class Train extends Car
{
    public function __construct(float $speed = 100.0)
    {
        parent::__construct($speed);
    }

    public function calculateTravelTime(float $distance): float
    {
        return parent::calculateTravelTime($distance);
    }
}
