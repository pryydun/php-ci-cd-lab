<?php

declare(strict_types=1);

namespace App\Services;

use App\Interfaces\LoggerInterface;
use App\Models\AbstractEntity;

final class EntityService
{
    public function __construct(
        private LoggerInterface $logger
    ) {}

    public function process(AbstractEntity $entity): void
    {
        $this->logger->log($entity->getDetails());
    }
}
