<?php

declare(strict_types=1);
// api/src/Entity/Review.php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * A review of a recipe.
 *
 * @ORM\Entity
 * @ApiResource
 */
class Review
{
    /**
     * @var int The id of this review.
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var int The rating of this review (between 0 and 5).
     *
     * @ORM\Column(type="smallint")
     * @Assert\NotBlank
     */
    public $rating;

    /**
     * @var string the body of the review.
     *
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     */
    public $body;

    /**
     * @var string The author of the review.
     *
     * @ORM\Column
     * @Assert\NotBlank
     */
    public $author;

    /**
     * @var \DateTimeInterface The date of publication of this review.
     *
     * @ORM\Column(type="datetime")
     * @Assert\NotNull
     */
    public $publicationDate;

    /**
     * @var Recipe The book this review is about.
     *
     * @ORM\ManyToOne(targetEntity="Recipe", inversedBy="reviews")
     * @Assert\NotNull
     */
    public $recipe;

    public function getId(): ?int
    {
        return $this->id;
    }
}
