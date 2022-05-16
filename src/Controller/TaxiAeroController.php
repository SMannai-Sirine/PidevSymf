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
     * @Route("/index", name="taxi_aero_index_user", methods={"GET"})
     */
    public function indexUser(TaxiAeroRepository $taxiAeroRepository): Response
    {
        return $this->render('taxi_aero/indexUser.html.twig', [
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
     * @Route("/{id}/show", name="taxi_aero_show", methods={"GET"})
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

        return $this->render('taxi_aero/EditAdmin.html.twig', [
            'taxi_aero' => $taxiAero,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/editUser", name="taxi_aero_edit_user", methods={"GET","POST"})
     */
    public function editUser(Request $request, TaxiAero $taxiAero): Response
    {
        $form = $this->createForm(TaxiAeroType::class, $taxiAero);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('taxi_aero_index_user', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('taxi_aero/edit.html.twig', [
            'taxi_aero' => $taxiAero,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/del", name="taxi_aero_delete", methods={"GET","POST"})
     */
    public function delete(Request $request, TaxiAero $taxiAero): Response
    {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($taxiAero);
            $entityManager->flush();
        return $this->redirectToRoute('taxi_aero_index');
    }

    /**
     * @Route("/{id}/del/User", name="taxi_aero_delete_user", methods={"GET","POST"})
     */
    public function deleteUser(Request $request, TaxiAero $taxiAero): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($taxiAero);
        $entityManager->flush();
        return $this->redirectToRoute('taxi_aero_index_user');
    }
}
