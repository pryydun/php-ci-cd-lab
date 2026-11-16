<?php

declare(strict_types=1);

namespace App\Models;

final class User extends AbstractEntity
{
    public function __construct(
        string $id,
        string $createdAt,
        protected string $name
    ) {
        parent::__construct($id, $createdAt);
    }

    public function getDetails(): string
    {
        return "Користувач: {$this->name}";
    }
}
