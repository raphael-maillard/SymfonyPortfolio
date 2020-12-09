<?php

namespace App\DataFixtures;

use App\Entity\Technologie;
use App\Repository\CategoryRepository;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class TechnologieFixtures extends Fixture
{
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function load(ObjectManager $manager)
    {
        $category = $this->categoryRepository->findAll();

        $technologies = [

        [
            "category_id" => $category[0],
            "name" => "Html",
            "resume" => "Le Html est un langage de balisage conçu pour représenter les pages web. C’est
                        un langage permettant d’écrire de l’hypertexte."
        ],
        [
            "category_id" => $category[0],
            "name" => "CSS",
            "resume" =>"Le CSS est un langage
                                        informatique utilisé sur l'internet pour mettre en forme les  zfichiers HTML ou XML."
        ],


        [
            "category_id" => $category[1],
            "name" => "Php",
            "resume" => "Le PHP est un langage de
                        programmation libre, principalement utilisé pour produire des pages
                        Web dynamiques via un serveur HTTP, mais pouvant également
                        fonctionner comme n'importe quel langage interprété de façon locale.
                        PHP est un langage impératif orienté objet."
        ],

        [
            "category_id" => $category[2],
            "name" => "Git / GitHub",
            "resume" => "Github est un service web d'hébergement et de gestion de développement de
                        logiciels, utilisant le logiciel de gestion de versions Git."
        ],

        [
            "category_id" => $category[3],
            "name" => "Windows",
            "resume" => "Un système d'exploitation tel
                        que ceux de la série Windows est un ensemble de programmes qui
                        manipule les moyens matériels de l'ordinateur et offre aux logiciels
                        applicatifs des services en rapport avec leur utilisation."
        ],
    
        ];

        for($i = 0; $i < count($technologies); ++$i){
            $technologie = new Technologie();
            
            $technologie->setCategory($technologies[$i]['category_id']);
            $technologie->setName($technologies[$i]['name']);
            $technologie->setResume($technologies[$i]['resume']);


            $manager->persist($technologie);
        }

        // add more products

        $manager->flush();
    }
}

?>