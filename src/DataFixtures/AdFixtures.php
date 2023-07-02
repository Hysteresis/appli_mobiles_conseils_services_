<?php

namespace App\DataFixtures;

use App\Entity\Ad;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker;

class AdFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory ::create('fr_FR');

        for($nbAds = 1; $nbAds <= 50; $nbAds++){
            
            $job = $this->getReference('job_' . $faker->numberBetween(1,22));
  
            $ad = new Ad();
            $ad->setSlug($faker->slug());
            $ad->setTitle($faker->realText(10));
            $ad->setRecruiter($faker->company());
            $ad->setSalary($faker->numberBetween(1800,3500));
            $ad->setDescription($faker->realText(400));
            $ad->setDegree('diplôme_' . $faker->numberBetween(1,10));
            $ad->addJob($job);

            $this->addReference('ad_' .$nbAds, $ad);

            $manager->persist($ad);
        }
            $manager->flush();

        $manager->flush();
    }
    
    public function getDependencies()
    {
        return[
            
            JobFixtures::class,
            

            ];
}

}
