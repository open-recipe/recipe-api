<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * A recipe.
 *
 * @ORM\Entity
 * @ApiResource
 */
class Recipe
{
    /**
     * @var int The id of this recipe.
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string The name of this recipe.
     *
     * @ORM\Column
     * @Assert\NotBlank
     */
    private $name;

    /**
     * @var string The featured picture's url of this recipe.
     *
     * @ORM\Column
     */
    private $featuredPicture;

    /**
     * @var DateTimeInterface The creation date of this recipe.
     *
     * @ORM\Column(type="datetime")
     * @Assert\NotNull
     */
    private $createdAt;

    /**
     * @var DateTimeInterface The update date of this recipe.
     *
     * @ORM\Column(type="datetime")
     */
    private $updateAt;

    /**
     * @ORM\Column(type="array", nullable=false)
     */
    private $steps = [];

    /**
     * @ORM\Column(type="array", nullable=false)
     */
    private $ingredients = [];

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getFeaturedPicture(): string
    {
        return $this->featuredPicture;
    }

    /**
     * @return DateTimeInterface
     */
    public function getCreatedAt(): DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * @return DateTimeInterface
     */
    public function getUpdateAt(): DateTimeInterface
    {
        return $this->updateAt;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param string $featuredPicture
     */
    public function setFeaturedPicture(string $featuredPicture): void
    {
        $this->featuredPicture = $featuredPicture;
    }

    /**
     * @param DateTimeInterface $createdAt
     */
    public function setCreatedAt(DateTimeInterface $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @param DateTimeInterface $updateAt
     */
    public function setUpdateAt(DateTimeInterface $updateAt): void
    {
        $this->updateAt = $updateAt;
    }

    public function getSteps(): array
    {
        return $this->steps;
    }

    public function setSteps(array $steps): self
    {
        $this->steps = $steps;

        return $this;
    }

    public function getIngredients(): array
    {
        return $this->ingredients;
    }

    public function setIngredients(array $ingredients): self
    {
        $this->ingredients = $ingredients;

        return $this;
    }
}