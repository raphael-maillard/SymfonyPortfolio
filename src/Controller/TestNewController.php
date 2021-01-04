<?php

namespace App\Controller;

use App\Entity\Project;
use App\Entity\Technologie;
use App\Form\ContactFromType;
use App\Repository\CategoryRepository;
use App\Repository\ProjectRepository;
use App\Repository\TechnologieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TestNewController extends AbstractController
{
    /**
     * @Route("/", name="test_new")
     */
    public function index(TechnologieRepository $technologieRepository, ProjectRepository $projectRepository, Request $request)
    {
        $form = $this->createForm(ContactFromType::class);

        $contact = $form->handleRequest($request);

        return $this->render('test_new/index.html.twig', [
            'controller_name' => 'TestNewController',
            'Technologies' => $technologieRepository->findAllASC(),
            'Projects' => $projectRepository->findAll(),
            'contact' =>$form->createView() 

            
            ]
        );
    }
}
