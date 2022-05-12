<?php

namespace App\Controller;

use App\Entity\Reservationevent;
use App\Entity\Evenement;
use App\Form\ReservationeventType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ReservationeventRepository; 


/**
 * @Route("/reservationevent")
 */
class ReservationeventController extends AbstractController
{
    /**
     * @Route("/", name="app_reservationevent_index", methods={"GET"})
     */
    public function index(EntityManagerInterface $entityManager): Response
    {
        $reservationevents = $entityManager
            ->getRepository(Reservationevent::class)
            ->findAll();

        return $this->render('reservationevent/index.html.twig', [
            'reservationevents' => $reservationevents,
        ]);
    }

    /**
     * @Route("/new", name="app_reservationevent_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $reservationevent = new Reservationevent();
        $form = $this->createForm(ReservationeventType::class, $reservationevent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($reservationevent);
            $entityManager->flush();

            return $this->redirectToRoute('app_reservationevent_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('reservationevent/new.html.twig', [
            'reservationevent' => $reservationevent,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_reservationevent_show", methods={"GET"})
     */
    public function show(Reservationevent $reservationevent): Response
    {
        return $this->render('reservationevent/show.html.twig', [
            'reservationevent' => $reservationevent,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_reservationevent_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Reservationevent $reservationevent, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ReservationeventType::class, $reservationevent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_reservationevent_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('reservationevent/edit.html.twig', [
            'reservationevent' => $reservationevent,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_reservationevent_delete", methods={"POST"})
     */
    public function delete(Request $request, Reservationevent $reservationevent, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reservationevent->getId(), $request->request->get('_token'))) {
            $entityManager->remove($reservationevent);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_reservationevent_index', [], Response::HTTP_SEE_OTHER);
    }
}
