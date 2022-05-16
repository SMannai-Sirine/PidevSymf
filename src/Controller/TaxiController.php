<?php

namespace App\Controller;

use App\Entity\Taxi;
use App\Form\TaxiType;
use App\Repository\TaxiRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/taxi")
 */
class TaxiController extends AbstractController
{
    /**
     * @Route("/", name="taxi_index", methods={"GET"})
     */
    public function index(TaxiRepository $taxiRepository): Response
    {
        return $this->render('taxi/index.html.twig', [
            'taxis' => $taxiRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="taxi_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $taxi = new Taxi();
        $form = $this->createForm(TaxiType::class, $taxi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($taxi);
            $entityManager->flush();

            return $this->redirectToRoute('taxi_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('taxi/new.html.twig', [
            'taxi' => $taxi,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="taxi_show", methods={"GET"})
     */
    public function show(Taxi $taxi): Response
    {
        return $this->render('taxi/show.html.twig', [
            'taxi' => $taxi,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="taxi_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Taxi $taxi): Response
    {
        $form = $this->createForm(TaxiType::class, $taxi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('taxi_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('taxi/edit.html.twig', [
            'taxi' => $taxi,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="taxi_delete", methods={"POST"})
     */
    public function delete(Request $request, Taxi $taxi): Response
    {
        if ($this->isCsrfTokenValid('delete'.$taxi->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($taxi);
            $entityManager->flush();
        }

        return $this->redirectToRoute('taxi_index', [], Response::HTTP_SEE_OTHER);
    }
}
