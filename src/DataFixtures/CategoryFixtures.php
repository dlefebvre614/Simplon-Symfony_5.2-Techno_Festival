<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    private array $categories = [
        "Mélodique",
        "Industrielle",
        "Groovy",
        "Deep",
        "Détroit"
    ];

    public function load(ObjectManager $manager)
    {
        foreach($this->categories as $name) {
            $category = new Category();
            $category->setLabel($name);
            $manager->persist($category);
        }

        $manager->flush();
    }

}
