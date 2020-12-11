<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $categories = [
            [
                "Name" => "Front-End",
                "image" => "monitor.svg"
            ],
            [
                "Name" => "Back-End",
                "image" => "server.svg"
            ],
            [
                "Name" => "Tools",
                "image" => "software.svg"
            ],
            [
                "Name" => "OS",
                "image" => "os.svg"
            ],
            
            [
                "Name" => "Veille technologique",
                "image" => "os.svg"
            ],

    
        ];

        for($i = 0; $i < count($categories); ++$i){
            $categorie = new Category();

            $categorie->setName($categories[$i]['Name']);
            $categorie->setImageName($categories[$i]['image']);
            $categorie->setCreatedAt(\DateTime::createFromFormat('Y-m-d', "2018-09-09"));


            $manager->persist($categorie);
        }

        // add more products

        $manager->flush();
    }
}

?>

