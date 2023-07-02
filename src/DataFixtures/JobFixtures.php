<?php

namespace App\DataFixtures;

use App\Entity\Job;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class JobFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $jobs = [
            1=>[
                'name' => 'Carreleur/Carreleuse',
            ],
            2=>[
                'name' => 'Charpentier/Charpentière bois',
            ],
            3=>[
                'name' => 'Charpentier/Charpentière métallique',
            ],
            4=>[
                'name' => 'Constructeur/Constructrice en béton armé',
            ],
            5=>[
                'name' => 'Couvreur/Couvreuse',
            ],

            6=>[
                'name' => 'Conducteur/Conductrice de travaux',
            ],
            7=>[
                'name' => 'Electricien/Electricienne',
            ],

            8=>[
                'name' => 'Grutier/Grutière',
            ],

            9=>[
                'name' => 'Maçon/Maçonne',
            ],
            10=>[
                'name' => 'Menuisier/Menuisière',
            ],

            11=>[
                'name' => 'Installateur thermique et climatique',
            ],
            12=>[
                'name' => 'Plâtrier/Plâtrière',
            ],
            13=>[
                'name' => 'Plombier/Plombière',
            ],
            14=>[
                'name' => 'Serrurier - Métallier/Serrurière - Métallière',
            ],
            15=>[
                'name' => 'Constructeur/Conductrice de routes',
            ],
            
            16=>[
                'name' => 'Conducteur/Conductrice de poids lourds',
            ],

            17=>[
                'name' => "Conducteur/Conductrice d'engins",
            ],

            18=>[
                'name' => "Constructeur/Constructrice en ouvrage d'Art",
            ],

            19=>[
                'name' => "Mécanicien/Mécanicienne d'engins de chantier",
            ],

            20=>[
                'name' => 'Monteur/Monteuse de réseaux électriques',
            ],

            21=>[
                'name' => 'Monteur/Monteuse de lignes caténaires',
            ],
            22=>[
                'name' => 'Technicien/Technicienne géomètre topographe',
            ],


        
        ];

        // $faker = Faker\Factory::create();
        
       
            foreach($jobs as $key =>$value){
                
               

                $job = new Job();
                $job->setName($value['name']);
                
                $this->addReference('job_' .$key, $job);
                $manager->persist($job);

    }
                $manager->flush();


}
}       


