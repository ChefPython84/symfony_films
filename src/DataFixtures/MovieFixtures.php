<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Movie;
use Faker;
class MovieFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        //$names_movie = ['anabelle', 'saw', 'harry potter', 'star wars', 'le seigneur des anneaux', 'le parrain', 'le loup de wall street', 'le labyrinthe', 'le roi lion', 'le seigneur des anneaux', 'avenger', 'loup','movie1','movie2','movie3','movie4','movie5','movie6','movie7','movie8','movie9','movie10','movie11','movie12','movie13','movie14','movie15','movie16','movie17','movie18','movie19','movie20','movie21','movie22','movie23','movie24','movie25','movie26','movie27','movie28','movie29','movie30','movie31','movie32','movie33','movie34','movie35','movie36','movie37','movie38','movie39','movie40'];
        //$names_directors = ['James Wan', 'James Wan', 'Chris Columbus', 'George Lucas', 'Peter Jackson', 'Francis Ford Coppola', 'Martin Scorsese', 'Wes Ball', 'Roger Allers', 'Peter Jackson', 'Joss Whedon', 'Nicolas Vanier','director1','director2','director3','director4','director5','director6','director7','director8','director9','director10','director11','director12','director13','director14','director15','director16','director17','director18','director19','director20','director21','director22','director23','director24','director25','director26','director27','director28','director29','director30','director31','director32','director33','director34','director35','director36','director37','director38','director39','director40'];
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Xylis\FakerCinema\Provider\Movie($faker));
        $faker->addProvider(new \Xylis\FakerCinema\Provider\Person($faker));


        foreach (range(1, 40) as $i) {
            $movie = new Movie();
            $movie->setTitle($faker->movie);
            $movie->setDescription($faker->overview);
            $movie->setDuration(rand(60, 180));
            $movie->setReleaseDate(new \DateTime());
            $movie->setCategory($this->getReference('category_' . rand(1, 5)));
            $movie->addActor($this->getReference('actor_' . rand(1, 10)));
            //$movie->setOnline(rand(0, 1) === 1);
            $movie->setNote(rand(0, 10));
            $movie->setEntries(rand(0, 1000000));
            $movie->setBudget(rand(0, 1000000));
            $movie->setDirector($faker->director);
            $movie->setWebsite('https://www.google.com/');



            $manager->persist($movie);
        }




        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            CategoryFixtures::class,
            ActorFixtures::class,
        ];
    }
}
