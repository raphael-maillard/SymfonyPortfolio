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
            ["Name" => "Front-End"],
            ["Name" => "Back-End"],
            ["Name" => "Tools"],
            ["Name" => "OS"],
    
        ];

        for($i = 0; $i < count($categories); ++$i){
            $categorie = new Category();

            $categorie->setName($categories[$i]['Name']);
            $categorie->setCreatedAt(\DateTime::createFromFormat('Y-m-d', "2018-09-09"));


            $manager->persist($categorie);
        }

        // add more products

        $manager->flush();
    }
}

?>

