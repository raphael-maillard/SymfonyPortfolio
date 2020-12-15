<?php

namespace App\DataFixtures;

use App\Entity\Project;
use Doctrine\Persistence\ObjectManager;
use App\Repository\TechnologieRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ProjectFixtures extends Fixture
{
    private $technologieRepository;

    public function __construct(TechnologieRepository $technologieRepository)
    {
        $this->technologieRepository = $technologieRepository;
    }


    public function load(ObjectManager $manager)
    {
        $technologie = $this->technologieRepository->findAll();


        $projects = [
      
            "name" => "Portfolio",
            "resume" => "Un manifique site.",
            "technologie"=> [$technologie[0],
                $technologie[1],
            ],            
            "imageName" => "https://via.placeholder.com/300",
        ];

        for($i = 0; $i < count($projects); ++$i){
            $project = new Project();
            
            $project->setName($projects[$i]['name']);
            $project->setResume($projects[$i]['resume']);
            $project->setCreatedAt(\DateTime::createFromFormat('Y-m-d', "2018-09-09"));
            // $project->setTechnologie($projects[$i]['technologie']);


            $manager->persist($project);
        }


        $manager->flush();
    }
}

?>