<?php

namespace App\DataFixtures;

use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use App\Entity\Nationality;

class NationalityFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $nationalities = ['Française', 'Américaine', 'Allemande', 'Suisse', 'Canadienne', 'Japonaise', 'Chinoise', 'Russe', 'Australienne', 'Brésilienne'];

        foreach (range(1, 10) as $i) {
            $nationality = new Nationality();
            $nationality->setName($nationalities[$i - 1]);
            $manager->persist($nationality);
            $this->addReference('nationality_' . $i, $nationality);
            //expose l'objet à l'extérieur de la classe pour les liaisons avec Movie
        }



        $manager->flush();
    }
}
