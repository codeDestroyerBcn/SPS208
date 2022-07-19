<?php

declare(strict_types=1);

namespace App\Repository\Tag;

use Sylius\Component\Resource\Repository\RepositoryInterface;

interface TagRepositoryInterface extends RepositoryInterface
{
    public function findByCodePart(string $phrase, ?int $limit): array;
}
