<?php

namespace App\DataFixtures;


use App\Entity\Answer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
Use Faker;

class AnswerFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory ::create('fr_FR');

        for($nbAnswers = 1; $nbAnswers <= 100; $nbAnswers++){
            $user = $this->getReference('user_' . $faker->numberBetween(1,20));
            $ad = $this->getReference(('ad_' . $faker->numberBetween(1,50)));
            $answerAd= new Answer();
            $answerAd->setDescription($faker->realText(400));
            $answerAd->setAd($ad);
            $answerAd->setUser($user);
            $this->addReference('answerAd_' .$nbAnswers, $answerAd);

            $manager->persist($answerAd);
        }
        $manager->flush();

    }
    public function getDependencies()
    {
        return[
            
            UserFixtures::class,
            AdFixtures::class,

            ];
}

}
