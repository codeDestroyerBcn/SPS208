<?php

declare(strict_types=1);

namespace App\Repository\Tag;

use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

final class TagRepository extends EntityRepository implements TagRepositoryInterface
{
    public function findByCodePart(string $phrase, ?int $limit = null): array
    {
        return $this->createQueryBuilder('o')
            ->where('o.code LIKE :phrase')
            ->setParameter('phrase', '%' . $phrase . '%')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult()
        ;
    }
}
