<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Actor;
use App\Entity\Category;
use App\Entity\Movie;
use App\Entity\Nationality;
use Faker;

class ActorFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        foreach (range(1, 60) as $i) {
            $actor = new Actor();
            $actor->setFirstName($faker->firstName);
            $actor->setLastName($faker->lastName);
            $actor->setNationality($this->getReference('nationality_' . rand(1, 10)));
            $actor->setReward(rand(0, 200));
            $manager->persist($actor);
            $this->addReference('actor_' . $i, $actor);
            //expose l'objet à l'extérieur de la classe pour les liaisons avec Movie
        }
        $manager->flush();
    }
    public function getDependencies(): array
    {
        return [
            NationalityFixtures::class,
        ];
    }
}
