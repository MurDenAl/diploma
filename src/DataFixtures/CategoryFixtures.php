<?php

namespace App\DataFixtures;

use App\Entity\Offers;
use App\Entity\Products;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Categories;
use Faker\Factory;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        for ($i = 0; $i < 10; $i++) {
            $category = new Categories();
            $category->setName($faker->word);
            $product = new Products();
            $product->setName($faker->word);
            $manager->persist($product);
            $category->addProduct($product);
            $offer = new Offers();
            $offer->setPrice($faker->numberBetween(1000, 100000));
            $offer->setProduct($product);
            $manager->persist($offer);
            $product = new Products();
            $product->setName($faker->word);
            $manager->persist($product);
            $category->addProduct($product);
            $manager->persist($category);
        }

        //for ($i = 0; $i < 4; $i++) {
        //    $category = new Categories();
        //    $category->setName('Products');
        //    $category->setParentId(rand(150, 160));
        //    $manager->persist($category);
        //}

        $manager->flush();
    }
}
