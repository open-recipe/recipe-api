<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ApiResource
 */
class Recipe
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", options={"unsigned": true})
     */
    public ?int $id = null;

    /**
     * @ORM\Column
     * @Assert\NotBlank
     */
    public string $name;

    /** @ORM\Column */
    public string $featuredPicture;

    /**
     * @ORM\Column(type="text[]", nullable=true)
     * @Assert\NotBlank
     * @Assert\All({
     *     @Assert\NotBlank
     * })
     */
    public array $steps = [];

    /**
     * @ORM\Column(type="text[]", nullable=true)
     * @Assert\NotBlank
     * @Assert\All({
     *     @Assert\NotBlank
     * })
     */
    public array $ingredients = [];

    /**
     * @ORM\Column(type="datetime")
     * @Assert\NotNull
     */
    public DateTimeInterface $createdAt;

    /** @ORM\Column(type="datetime") */
    public DateTimeInterface $updateAt;

    public function __toString(): string
    {
        return $this->name;
    }
}
