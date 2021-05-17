<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Article;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        
        for($i = 0;$i < 20; $i++)
        {
            $article = new Article();
            $article
                ->setTitle($faker->sentence)
                ->setContent($faker->text(2000))
                ->setCreatedAt(new \Datetime());
            $manager->persist($article);
        }

        $manager->flush();
    }
}
