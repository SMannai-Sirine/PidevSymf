<?php

namespace App\Controller;

use App\Entity\TaxiAero;
use App\Form\TaxiAeroType;
use App\Repository\TaxiAeroRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/taxi/aero")
 */
class TaxiAeroController extends AbstractController
{
    /**
     * @Route("/", name="taxi_aero_index", methods={"GET"})
     */
    public function index(TaxiAeroRepository $taxiAeroRepository): Response
    {
        return $this->render('taxi_aero/index.html.twig', [
            'taxi_aeros' => $taxiAeroRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="taxi_aero_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $taxiAero = new TaxiAero();
        $form = $this->createForm(TaxiAeroType::class, $taxiAero);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($taxiAero);
            $entityManager->flush();

            return $this->redirectToRoute('taxi_aero_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('taxi_aero/new.html.twig', [
            'taxi_aero' => $taxiAero,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="taxi_aero_show", methods={"GET"})
     */
    public function show(TaxiAero $taxiAero): Response
    {
        return $this->render('taxi_aero/show.html.twig', [
            'taxi_aero' => $taxiAero,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="taxi_aero_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TaxiAero $taxiAero): Response
    {
        $form = $this->createForm(TaxiAeroType::class, $taxiAero);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('taxi_aero_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('taxi_aero/edit.html.twig', [
            'taxi_aero' => $taxiAero,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="taxi_aero_delete", methods={"POST"})
     */
    public function delete(Request $request, TaxiAero $taxiAero): Response
    {
        if ($this->isCsrfTokenValid('delete'.$taxiAero->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($taxiAero);
            $entityManager->flush();
        }

        return $this->redirectToRoute('taxi_aero_index', [], Response::HTTP_SEE_OTHER);
    }
}
