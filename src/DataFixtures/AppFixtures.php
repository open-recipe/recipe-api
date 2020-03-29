<?php

declare(strict_types=1);

namespace App\DataFixtures;

use ApiPlatform\Core\Validator\ValidatorInterface;
use App\Entity\Recipe;
use App\Exception\ConstraintViolationListException;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

final class AppFixtures extends Fixture
{
    private ValidatorInterface $validator;

    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    public function load(ObjectManager $manager)
    {
        $this->loadRecipes($manager);

        $manager->flush();
    }

    private function loadRecipes(ObjectManager $manager): void
    {
        $recipes = [];

        $onePot = new Recipe();
        $onePot->name = "Jules's One Pot";
        $onePot->featuredPicture = '';
        $onePot->ingredients = [
            '250g de blé',
            '250g de mascarpone',
            '150g de lardons',
            '2 gros blancs de poireaux',
            '1 cube bouillon légumes',
            "50cl d'eau",
            "1 cuillère à soupe d'huile d'olive",
            'Persil',
            'Sel',
            'Poivre',
        ];
        $onePot->steps = [
            'Tout mélanger dans une cocotte',
            'Feu moyen 15-20min en remuant régulièrement',
        ];
        $onePot->createdAt = new \DateTime();
        $onePot->updateAt = new \DateTime();

        $recipes[] = $onePot;

        foreach ($recipes as $recipe) {
            $this->validateAndPersist($manager, $recipe);
        }
    }

    private function validateAndPersist(ObjectManager $manager, object $object): void
    {
        $violations = $this->validator->validate($object);

        if (null !== $violations and \count($violations)) {
            throw new ConstraintViolationListException($violations);
        }

        $manager->persist($object);
    }
}
