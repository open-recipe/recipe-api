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
    public $name;

    /**
     * @var string The featured picture's url of this recipe.
     *
     * @ORM\Column
     */
    public $featuredPicture;

    /**
     * @var DateTimeInterface The creation date of this recipe.
     *
     * @ORM\Column(type="datetime")
     * @Assert\NotNull
     */
    public $createdAt;

    /**
     * @var DateTimeInterface The update date of this recipe.
     *
     * @ORM\Column(type="datetime")
     */
    public $updateAt;

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
}
