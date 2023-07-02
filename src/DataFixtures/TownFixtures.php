<?php

namespace App\DataFixtures;

use App\Entity\Town;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class TownFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        for($nbTowns = 1; $nbTowns <= 200; $nbTowns++){
            $town = new Town();
            $town->setName($faker->city());
            $town->setNumber($faker->postcode());
            $town->setDepartment($faker->departmentName());
            
            $manager->persist($town);
        }
        $manager->flush();
    }
}
