<?php
// api/src/Entity/Recipe.php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
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
     * @var string The title of this recipe.
     *
     * @ORM\Column
     * @Assert\NotBlank
     */
    public $title;

    /**
     * @var string[] The ingredients of this recipe.
     *
     * @ORM\Column(type="array")
     * @Assert\NotBlank
     */
    public $ingredients;

    /**
     * @var string The recipe.
     *
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     */
    public $recipe;

    /**
     * @var string The author of this recipe.
     *
     * @ORM\Column
     * @Assert\NotBlank
     */
    public $author;

    /**
     * @var \DateTimeInterface The publication date of this recipe.
     *
     * @ORM\Column(type="datetime")
     * @Assert\NotNull
     */
    public $publicationDate;

    /**
     * @var Review[] Available reviews for this recipe.
     *
     * @ORM\OneToMany(targetEntity="Review", mappedBy="recipe", cascade={"persist", "remove"})
     */
    public $reviews;

    public function __construct()
    {
        $this->reviews = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}