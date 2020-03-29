<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // create 20 users! Bam!
        for ($i = 0; $i < 20; ++$i) {
            $user = new User(sprintf('user%d@example.com', $i));
            $user->setPassword('123456');
            $manager->persist($user);
        }

        $manager->flush();
    }
}
