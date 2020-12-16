<?php

namespace App\DataFixtures;

use App\Entity\Project;
use Doctrine\Persistence\ObjectManager;
use App\DataFixtures\TechnologieFixtures;
use App\Repository\TechnologieRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ProjectFixtures extends Fixture implements DependentFixtureInterface
{
    private $technologieRepository;

    public function __construct(TechnologieRepository $technologieRepository)
    {
        $this->technologieRepository = $technologieRepository;
    }


    public function load(ObjectManager $manager) 
    {
        $technologie = $this->technologieRepository->findOneByName('CSS');

        $faker = \Faker\Factory::create('fr_FR');

        $projects = [
        ];

        for($i = 0; $i <= 5 ; ++$i){
            $project = new Project();
            
            $project->setName($faker->name());
            $project->setResume($faker->text());
            $project->setImageName($faker->imageUrl());
            $project->setLink($faker->url());
            $project->setCreatedAt(\DateTime::createFromFormat('Y-m-d', "2018-09-09"));
            $project->addTechnology($technologie);
            // $project->setTechnologie($projects[$i]['technologie']);

            $manager->persist($project);
        }


        $manager->flush();
    }

        public function getDependencies()
    {
        return array(
            TechnologieFixtures::class
            // CategoryFixtures::class
        );
    }
}



?>