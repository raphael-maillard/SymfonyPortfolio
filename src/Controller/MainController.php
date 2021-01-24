<?php

namespace App\Controller;

use App\Form\ContactFormType;
use App\Repository\AboutRepository;
use App\Repository\ProjectRepository;
use App\Repository\TechnologieRepository;
use Swift_Mailer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main")
     */
    public function index(TechnologieRepository $technologieRepository, ProjectRepository $projectRepository, Request $request, Swift_Mailer $mailer, AboutRepository $aboutRepository)
    {
        $form = $this->createForm(ContactFormType::class);

        $contact = $form->handleRequest($request);
        
        
        if($form->isSubmitted() && $form->isValid()){

            $email = (new \Swift_Message('Sitez Perosnnel'))
                    ->setFrom($contact->get('email')->getData())
                    ->setTo('raphael.maillard@gmail.com')
                    ->setBody(
                        $this->renderView(
                            'emails/contact.html.twig',[
                            'firstname' => $contact->get('firstname')->getData(),
                            'lastname' => $contact->get('lastname')->getData(),
                            'message' => $contact->get('message')->getData(),
                            'mail' => $contact->get('email')->getData()]
                        ),
                        'text/html'
                    );

            
            // Send the mail
            $mailer->send($email);

            // Message to confirm the send
            // $this->addFlash('Message', 'Votre e-mail a bien été envoyé');
            // Redirect after send 
            return $this->redirectToRoute('main');
        }


        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'Technologies' => $technologieRepository->findAllASC(),
            'Projects' => $projectRepository->findAll(),
            'contact' => $form->createView(),
            'about' => $aboutRepository->findAll()

            ]
        );
    }
}
