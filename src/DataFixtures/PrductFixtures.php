<?php

namespace App\DataFixtures;

use App\Entity\Products;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class PrductFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //$faker = Factory::create();
        //for ($i = 0; $i < 20; $i++) {
        //    $category = new Products();
        //    $category->setName($faker->word);
        //    $manager->persist($category);
        //}

        //$manager->flush();
    }
}
