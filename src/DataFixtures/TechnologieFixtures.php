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
            "category_id" => $category[0],
            "name" => "Javascript",
            "resume" =>"Le Javascript est un langage de programmation de scripts principalement employé dans les pages web
                                    interactives mais aussi pour les serveurs avec l'utilisation (par exemple) de Node.js"
        ],
        [
            "category_id" => $category[0],
            "name" => "Bootstrap",
            "resume" =>"Bootstrap est une bibliothéque utiles à la création du design (graphisme,
                                    animation et interactions avec la page dans le navigateur, etc.) de sites et
                                    d'applications web."
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
            "category_id" => $category[1],
            "name" => "Java",
            "resume" => "Java est un langage de programmation orienté objet Une particularité de Java est que les logiciels écrits dans ce langage
                            sont compilés vers une représentation binaire intermédiaire qui peut
                            être exécutée dans une machine virtuelle Java (JVM) en faisant
                            abstraction du système d'exploitation."
        ],
        [
            "category_id" => $category[1],
            "name" => "Kotlin",
            "resume" => "Kotlin est un langage de
                            programmation orienté objet et fonctionnel, avec un typage statique
                            qui permet de compiler pour la machine virtuelle Java, JavaScript,
                            et vers plusieurs plateformes en natif (grâce à LLVM)."
        ],
        [
            "category_id" => $category[1],
            "name" => "SQL",
            "resume" => "Le SQL est un langage informatique normalisé servant à exploiter des bases de données relationnelles."
        ],

        [
            "category_id" => $category[2],
            "name" => "Git / GitHub",
            "resume" => "Github est un service web d'hébergement et de gestion de développement de
                        logiciels, utilisant le logiciel de gestion de versions Git."
        ],
        [
            "category_id" => $category[2],
            "name" => "Symfony",
            "resume" => "Symfony est un ensemble de composants PHP ainsi
                            qu'un framework MVC libre écrit en PHP. Il fournit des fonctionnalités modulables et
                            adaptables qui permettent de faciliter et d’accélérer le développement d'un site web."
        ],
        [
            "category_id" => $category[2],
            "name" => "Visual Studio Code",
            "resume" => "Visual Studio Code est un éditeur de code extensible développé par
                            Microsoft."
        ],
        [
            "category_id" => $category[2],
            "name" => "Sublime Text 3",
            "resume" => "Sublime Text est un éditeur de texte générique
                            codé en C++ et Python."
        ],
        [
            "category_id" => $category[2],
            "name" => "Android Studio",
            "resume" => "Android Studio est un
                            environnement de développement pour développer des applications mobiles
                            Android."
        ],
        [
            "category_id" => $category[2],
            "name" => "LAMP / WAMP",
            "resume" => "LAMP/ WAMP est un acronyme désignant un ensemble de logiciels libres
                            permettant de construire des serveurs de sites web."
        ],
        [
            "category_id" => $category[2],
            "name" => "MySQL / MariaDB",
            "resume" => "MySQL/MariaDB sont des systèmes de gestions de bases de données
                            relationnelles."
        ],

        [
            "category_id" => $category[3],
            "name" => "Windows",
            "resume" => "Un système d'exploitation tel
                        que ceux de la série Windows est un ensemble de programmes qui
                        manipule les moyens matériels de l'ordinateur et offre aux logiciels
                        applicatifs des services en rapport avec leur utilisation."
        ],

        [
            "category_id" => $category[3],
            "name" => "Debian",
            "resume" => "Debian est une distribution GNU/Linux non commerciale,
                            elle a pour principal but de fournir un système d'exploitation
                            composé uniquement de logiciels libres."
        ],

        [
            "category_id" => $category[3],
            "name" => "Ubuntu",
            "resume" => "Ubuntu est un système d’exploitation GNU/Linux basé
                            sur la distribution Linux Debian."
        ],

        [
            "category_id" => $category[3],
            "name" => "VMware ESXi",
            "resume" => "Ce produit s'installe sur la
                            couche matérielle (on parle d'hyperviseur de type 1), et non sur un
                            système d'exploitation « hôte ». VMware ESX permet une gestion plus
                            précise des ressources de chaque machine virtuelle et de meilleures
                            performances."
        ],
        [
            "category_id" => $category[4],
            "name" => "Veille Technologique",
            "resume" => "Je suis toujours à l'affût de nouvelle technologies, j'aime me renseigner sur divers sujets"
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