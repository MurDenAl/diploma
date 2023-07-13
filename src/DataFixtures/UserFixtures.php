<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use Faker\Factory;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        for ($i = 0; $i < 5; $i++) {
            $category = new User();
            $category->setEmail($faker->email);
            $category->setPassword('1234');
            $manager->persist($category);
        }

        $manager->flush();
    }
}
