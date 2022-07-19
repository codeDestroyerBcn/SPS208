<?php

declare(strict_types=1);

namespace App\Entity\Tag;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="tapir_tag")
 */
class Tag implements TagInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer", name="id")
     */
    protected ?int $id;

    /** @ORM\Column(type="string", name="sales_tag_code", unique=true) */
    protected string $code = '';

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    public function __toString(): string
    {
        return $this->code;
    }
}
