<?php

namespace App\DataFixtures;

use App\Entity\Merchants;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class MerchantFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        for ($i = 0; $i < 5; $i++) {
            $category = new Merchants();
            $category->setName($faker->name);
            $manager->persist($category);
        }

        $manager->flush();
    }
}
