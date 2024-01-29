<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //Genere moi 5 objets de type Category fictifs

        $names_category = ['Action', 'Aventure', 'Horreur', 'Comédie', 'Drame'];

        foreach (range(1, 5) as $i) {
            $category = new Category();
            $category->setName($names_category[$i - 1]);
            $manager->persist($category);
            $this->addReference("category_$i", $category); //On ajoute une référence à chaque objet généré
            // pour pouvoir les récupérer dans d'autres fixtures
        }

        $manager->flush();
    }
}
