<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //Genere moi 5 objets de type Category fictifs

        //$names_category = ['Action', 'Aventure', 'Horreur', 'Comédie', 'Drame'];
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Xylis\FakerCinema\Provider\Movie($faker));
        foreach (range(1, 10) as $i) {
            $category = new Category();
            $category->setName($faker->movieGenre());
            $manager->persist($category);
            $this->addReference("category_$i", $category); //On ajoute une référence à chaque objet généré
            // pour pouvoir les récupérer dans d'autres fixtures
        }

        $manager->flush();
    }
}
