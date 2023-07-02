<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
Use Faker;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this->encoder = $encoder;

    }

    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
            
            $user = new User();
            
            $user->setEmail($faker->email());
            $user->setRoles(['ROLE_ADMIN']);
            $user->setPassword($this->encoder->hashPassword($user,'azerty'));

            $manager->persist($user);



            $manager->flush();
    }
}
