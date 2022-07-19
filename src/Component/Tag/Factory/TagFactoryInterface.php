<?php

declare(strict_types=1);

namespace App\Component\Tag\Factory;

use App\Entity\Tag\TagInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;

interface TagFactoryInterface extends FactoryInterface
{
    public function createNew(): object;

    public function createNewWithCode(string $code): TagInterface;
}
