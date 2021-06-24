<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Artist;
use App\Entity\Category;

class AppFixtures extends Fixture
{
    public array $categories = [
        'Mélodique' => 'danger',
        'Industrielle' => 'info',
        'Groovy' => 'secondary',
        'Deep' => 'warning',
        'Détroit' => 'success',
    ];

    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 5; $i++) {
            $category = new Category();
            $category->setName('Cat' . $i);
            $manager->persist($category);

            for ($j = 0; $j < 20; $j++) {
                $artist = new Artist();
                $artist->setName('Artist' . $j);
                $artist->setIsLive(0);
                $artist->setCategory($category);
                $manager->persist($artist);

                // $manager->flush();
            }

            $manager->flush();
        }
    }
}
