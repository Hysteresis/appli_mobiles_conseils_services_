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
            // $employmentContract = $this->getReference('employmentContract_' . $faker->numberBetween(1,7));
            // $recruiter = $this->getReference(('recruiter_' . 
            // $faker->numberBetween(1,30);
            // $department = $this->getReference('department_' . $faker->numberBetween(1,101));
            // $degree = $this->getReference('degree_' . $faker->numberBetween(1,13));
            // $town = $this->getReference('town_' . $faker->numberBetween(1,100));
            // $salary = $this->getReference('salary_' . $faker->numberBetween(1,100));
            $job = $this->getReference('job_' . $faker->numberBetween(1,22));
        // $product = new Product();
        // $manager->persist($product);
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
   