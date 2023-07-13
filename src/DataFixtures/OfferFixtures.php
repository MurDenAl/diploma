<?php

namespace App\DataFixtures;

use App\Entity\Offers;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class OfferFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //$faker = Factory::create();
        //for ($i = 0; $i < 20; $i++) {
        //    $category = new Offers();
        //    $category->setPrice($faker->numberBetween(1000, 100000));
        //    $manager->persist($category);
        //}

        $manager->flush();
    }
}
