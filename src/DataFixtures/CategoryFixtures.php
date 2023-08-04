<?php

namespace App\DataFixtures;

use App\Entity\Merchants;
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
            $manager->persist($category);
            $merchant = new Merchants();
            $merchant->setName($faker->word);
            $manager->persist($merchant);
            $product = new Products();
            $product->setName($faker->word);
            $product->setCategory($category);
            $manager->persist($product);
            for ($c = 0; $c < 3; $c++) {
                $offer = new Offers();
                $offer->setPrice($faker->numberBetween(7, 50));
                $offer->setProduct($product);
                $offer->setMerchant($merchant);
                $manager->persist($offer);
            }
            $manager->flush();
            if ($faker->boolean(60)) {
                $subcategory = new Categories();
                $subcategory->setName($faker->word);
                $subcategory->setParentId($category->getId());
                $manager->persist($subcategory);
                //$manager->flush();
                $product = new Products();
                $product->setName($faker->word);
                $product->setCategory($subcategory);
                $manager->persist($product);
                $offer = new Offers();
                $offer->setPrice($faker->numberBetween(7, 50));
                $offer->setProduct($product);
                $offer->setMerchant($merchant);
                $manager->persist($offer);
                $manager->flush();
            }
        }
    }
}
