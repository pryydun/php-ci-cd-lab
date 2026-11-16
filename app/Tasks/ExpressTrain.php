<?php

declare(strict_types=1);

namespace App\Tasks;

class ExpressTrain extends Train
{
    public function __construct(float $speed = 160.0)
    {
        parent::__construct($speed);
    }

    public function calculateTravelTime(float $distance): float
    {
        return parent::calculateTravelTime($distance);
    }
}
