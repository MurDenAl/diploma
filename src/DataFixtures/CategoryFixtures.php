<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Categories;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 10; $i++) {
            $category = new Categories();
            $category->setName('Goods');
            $manager->persist($category);
        }
        for ($i = 0; $i < 4; $i++) {
            $category = new Categories();
            $category->setName('Products');
            $category->setParentId(rand(2, 10));
            $manager->persist($category);
        }

        $manager->flush();
    }
}
