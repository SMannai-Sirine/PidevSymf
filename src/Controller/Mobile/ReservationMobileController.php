<?php
namespace App\Controller\Mobile;

use App\Entity\Reservation;
use App\Repository\ReservationRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/mobile/reservation")
 */
class ReservationMobileController extends AbstractController
{
    /**
     * @Route("", methods={"GET"})
     */
    public function index(ReservationRepository $reservationRepository): Response
    {
        $reservations = $reservationRepository->findAll();

        if ($reservations) {
            return new JsonResponse($reservations, 200);
        } else {
            return new JsonResponse([], 204);
        }
    }

    /**
     * @Route("/add", methods={"POST"})
     */
    public function add(Request $request): JsonResponse
    {
        $reservation = new Reservation();

        return $this->manage($reservation, $request, false);
    }

    /**
     * @Route("/edit", methods={"POST"})
     */
    public function edit(Request $request, ReservationRepository $reservationRepository): Response
    {
        $reservation = $reservationRepository->find((int)$request->get("id"));

        if (!$reservation) {
            return new JsonResponse(null, 404);
        }

        return $this->manage($reservation, $request, true);
    }

    public function manage($reservation, $request, $isEdit): JsonResponse
    {   
        
        $reservation->setUp(
            (int)$request->get("idRes"),
            (int)$request->get("type"),
            $request->get("etat")
        );
        
        

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($reservation);
        $entityManager->flush();

        return new JsonResponse($reservation, 200);
    }

    /**
     * @Route("/delete", methods={"POST"})
     */
    public function delete(Request $request, EntityManagerInterface $entityManager, ReservationRepository $reservationRepository): JsonResponse
    {
        $reservation = $reservationRepository->find((int)$request->get("id"));

        if (!$reservation) {
            return new JsonResponse(null, 200);
        }

        $entityManager->remove($reservation);
        $entityManager->flush();

        return new JsonResponse([], 200);
    }

    /**
     * @Route("/deleteAll", methods={"POST"})
     */
    public function deleteAll(EntityManagerInterface $entityManager, ReservationRepository $reservationRepository): Response
    {
        $reservations = $reservationRepository->findAll();

        foreach ($reservations as $reservation) {
            $entityManager->remove($reservation);
            $entityManager->flush();
        }

        return new JsonResponse([], 200);
    }
    
}
