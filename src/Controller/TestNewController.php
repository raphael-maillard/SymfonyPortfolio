<?php

namespace App\Controller;

use App\Entity\Project;
use App\Entity\Technologie;
use App\Form\ContactFormType;
use App\Repository\AboutRepository;
use Symfony\Component\Mime\Address;
use App\Repository\ProjectRepository;
use App\Repository\CategoryRepository;
use App\Repository\TechnologieRepository;
use Swift_Mailer;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TestNewController extends AbstractController
{
    /**
     * @Route("/", name="test_new")
     */
    public function index(TechnologieRepository $technologieRepository, ProjectRepository $projectRepository, Request $request, Swift_Mailer $mailer, AboutRepository $aboutRepository)
    {
        $form = $this->createForm(ContactFormType::class);

        $contact = $form->handleRequest($request);
        
        
        if($form->isSubmitted() && $form->isValid()){
            // var_dump($contact);
            // die;
            // We create/load the mail
            // $email = (new TemplatedEmail())
            //     ->from($contact->get('email')->getData())
            //     ->to(new Address('raphael.maillard@gmail.com', 'Site raphael-maillard.fr'))
            //     ->subject('Mail venant du site personnel '.$contact->get('firstname')->getData())
            //     ->htmlTemplate('emails/contact.html.twig')
            //     ->context([
            //         'firstname' => $contact->get('firstname')->getData(),
            //         'lastname' => $contact->get('lastname')->getData(),
            //         'message' => $contact->get('message')->getData(),
            //         'mail' => $contact->get('email')->getData()
            //     ]);
            $email = (new \Swift_Message('Sitez Perosnnel'))
                    ->setFrom($contact->get('email')->getData())
                    ->setTo('raphael.maillard@gmail.com')
                    ->setBody(
                        $this->renderView(
                            // templates/emails/registration.html.twig
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
            return $this->redirectToRoute('test_new');
        }


        return $this->render('test_new/index.html.twig', [
            'controller_name' => 'TestNewController',
            'Technologies' => $technologieRepository->findAllASC(),
            'Projects' => $projectRepository->findAll(),
            'contact' => $form->createView(),
            'about' => $aboutRepository->findAll()

            ]
        );
    }
}
