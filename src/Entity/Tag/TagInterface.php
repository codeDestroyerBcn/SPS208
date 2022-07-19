<?php

declare(strict_types=1);

namespace App\Entity\Tag;

use Sylius\Component\Resource\Model\ResourceInterface;

interface TagInterface extends ResourceInterface
{
    public function getId(): ?int;

    public function getCode(): string;

    public function setCode(string $code): void;
}
