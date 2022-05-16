<?php

namespace App\Controller;
use App\Entity\Evenement;
use App\Entity\RatingEvent;
use App\Form\RatingEventType;
use App\Repository\EvenementRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EventUserController extends AbstractController
{
    /**
     * @Route("/event/user", name="app_event_user")
     */
    public function index(EvenementRepository $evenementRepository): Response
    {
        return $this->render('event_user/index.html.twig', [
            'evenements' => $evenementRepository->findAll(),
        ]);
    }


    /**
     * @Route("/event/{idevent}", name="app_eventuser_show", methods={"GET"})
     */
    public function show(Evenement $evenement): Response
    {
        return $this->render('event_user/show.html.twig', [
            'evenement' => $evenement,
        ]);
    }
    /**
     * @Route("/location/{idevent}/map", name="app_eventuser_show_map", methods={"GET"})
     */
    public function map(Evenement $evenement): Response
    {
        return $this->render('event_user/map.html.twig', [
            'evenement' => $evenement,
        ]);
    }



}
