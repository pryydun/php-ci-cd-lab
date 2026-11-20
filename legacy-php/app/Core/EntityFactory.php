<?php

declare(strict_types=1);

namespace App\Core;

use App\Models\AbstractEntity;
use App\Models\Product;
use App\Models\User;

final class EntityFactory
{
    public static function createEntity(
        string $type,
        array $data
    ): AbstractEntity {
        return match ($type) {
            'product' => new Product(
                $data['id'],
                $data['createdAt'],
                $data['name'],
                $data['price']
            ),
            'user' => new User(
                $data['id'],
                $data['createdAt'],
                $data['name']
            ),
            default => throw new \InvalidArgumentException(
                'Невідомий тип сутності'
            ),
        };
    }
}
