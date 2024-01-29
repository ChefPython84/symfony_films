<?php

namespace App\DataFixtures;

use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    public function __construct(
        protected UserPasswordHasherInterface $passwordHasher
    ) {
    }

    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user_2 = new User();
        $user_3 = new User();
        $user -> setUsername('Erwan');
        $user_2 -> setUsername('Fred');
        $user_3 -> setUsername('Jean');
        $user->setEmail('user@gmail.com');
        $user_2->setEmail('user2@gmail.com');
        $user_3->setEmail('jean@gmail.com');

        $user->setPassword($this->passwordHasher->hashPassword($user, 'password'));
        $user_2->setPassword($this->passwordHasher->hashPassword($user_2, 'password'));
        $user_3->setPassword($this->passwordHasher->hashPassword($user_3, 'password'));

        //$user->setRoles(['ROLE_ADMIN']);
        //$user_2->setRoles(['ROLE_USER']);
        //$user_3->setRoles(['ROLE_ADMIN']);

        $manager->persist($user);
        $manager->persist($user_2);
        $manager->persist($user_3);
        $manager->flush();
    }
}
