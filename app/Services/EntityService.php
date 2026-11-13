<?php

declare(strict_types=1);

// Обчислення загальної вартості товарів
function calculateTotal(float $price, int $quantity): float
{
    return $price * $quantity;
}

// Обчислення ціни зі знижкою
function applyDiscount(float $price, float $discount): float
{
    // Перевірка допустимості знижки
    if ($discount < 0 || $discount > 100) {
        throw new Exception('Неприпустиме значення знижки!');
    }

    // Повернення ціни після знижки
    return $price - ($price * ($discount / 100));
}
