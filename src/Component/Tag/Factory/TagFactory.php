<?php

declare(strict_types=1);

namespace App\Component\Tag\Factory;

use App\Entity\Tag\TagInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;

final class TagFactory implements TagFactoryInterface
{
    private FactoryInterface $decoratedFactory;

    public function __construct(FactoryInterface $decoratedFactory)
    {
        $this->decoratedFactory = $decoratedFactory;
    }

    public function createNew(): object
    {
        return $this->decoratedFactory->createNew();
    }

    public function createNewWithCode(string $code): TagInterface
    {
        /** @var TagInterface $tag */
        $tag = $this->createNew();
        $tag->setCode($code);

        return $tag;
    }
}
