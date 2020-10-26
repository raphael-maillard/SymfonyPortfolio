<?php

namespace App\Controller;

use App\Entity\Technologie;
use App\Form\TechnologieType;
use App\Repository\TechnologieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/technologie")
 */
class TechnologieController extends AbstractController
{
    /**
     * @Route("/", name="technologie_index", methods={"GET"})
     */
    public function index(TechnologieRepository $technologieRepository): Response
    {
        return $this->render('technologie/index.html.twig', [
            'technologies' => $technologieRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="technologie_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $technologie = new Technologie();
        $form = $this->createForm(TechnologieType::class, $technologie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($technologie);
            $entityManager->flush();

            return $this->redirectToRoute('technologie_index');
        }

        return $this->render('technologie/new.html.twig', [
            'technologie' => $technologie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="technologie_show", methods={"GET"})
     */
    public function show(Technologie $technologie): Response
    {
        return $this->render('technologie/show.html.twig', [
            'technologie' => $technologie,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="technologie_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Technologie $technologie): Response
    {
        $form = $this->createForm(TechnologieType::class, $technologie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('technologie_index');
        }

        return $this->render('technologie/edit.html.twig', [
            'technologie' => $technologie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="technologie_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Technologie $technologie): Response
    {
        if ($this->isCsrfTokenValid('delete'.$technologie->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($technologie);
            $entityManager->flush();
        }

        return $this->redirectToRoute('technologie_index');
    }
}
