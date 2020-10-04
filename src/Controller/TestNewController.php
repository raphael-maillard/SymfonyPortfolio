<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TestNewController extends AbstractController
{
    /**
     * @Route("/test/new", name="test_new")
     */
    public function index()
    {
        return $this->render('test_new/index.html.twig', [
            'controller_name' => 'TestNewController',
        ]);
    }
}
