<?php

namespace App\Controller;

use App\Entity\LocVoiture;
use App\Form\LocVoitureType;
use App\Repository\LocVoitureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/loc/voiture")
 */
class LocVoitureController extends AbstractController
{
    /**
     * @Route("/", name="loc_voiture_index", methods={"GET"})
     */
    public function index(LocVoitureRepository $locVoitureRepository): Response
    {
        return $this->render('loc_voiture/index.html.twig', [
            'loc_voitures' => $locVoitureRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="loc_voiture_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $locVoiture = new LocVoiture();
        $form = $this->createForm(LocVoitureType::class, $locVoiture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $locVoiture->setRemise(false);
            $locVoiture->setTauxRemise(0);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($locVoiture);
            $entityManager->flush();

            return $this->redirectToRoute('loc_voiture_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('loc_voiture/new.html.twig', [
            'loc_voiture' => $locVoiture,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="loc_voiture_show", methods={"GET"})
     */
    public function show(LocVoiture $locVoiture): Response
    {
        return $this->render('loc_voiture/show.html.twig', [
            'loc_voiture' => $locVoiture,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="loc_voiture_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, LocVoiture $locVoiture): Response
    {
        $form = $this->createForm(LocVoitureType::class, $locVoiture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('loc_voiture_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('loc_voiture/edit.html.twig', [
            'loc_voiture' => $locVoiture,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="loc_voiture_delete", methods={"POST"})
     */
    public function delete(Request $request, LocVoiture $locVoiture): Response
    {
        if ($this->isCsrfTokenValid('delete'.$locVoiture->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($locVoiture);
            $entityManager->flush();
        }

        return $this->redirectToRoute('loc_voiture_index', [], Response::HTTP_SEE_OTHER);
    }
}
