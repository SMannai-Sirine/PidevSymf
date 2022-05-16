<?php
namespace App\Controller\Mobile;

use App\Entity\Voiture;
use App\Repository\VoitureRepository;
use App\Repository\PaysRepository;
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
 * @Route("/mobile/voiture")
 */
class VoitureMobileController extends AbstractController
{
    /**
     * @Route("", methods={"GET"})
     */
    public function index(VoitureRepository $voitureRepository): Response
    {
        $voitures = $voitureRepository->findAll();

        if ($voitures) {
            return new JsonResponse($voitures, 200);
        } else {
            return new JsonResponse([], 204);
        }
    }

    /**
     * @Route("/add", methods={"POST"})
     */
    public function add(Request $request, PaysRepository $paysRepository): JsonResponse
    {
        $voiture = new Voiture();

        return $this->manage($voiture, $paysRepository,  $request, false);
    }

    /**
     * @Route("/edit", methods={"POST"})
     */
    public function edit(Request $request, VoitureRepository $voitureRepository, PaysRepository $paysRepository): Response
    {
        $voiture = $voitureRepository->find((int)$request->get("id"));

        if (!$voiture) {
            return new JsonResponse(null, 404);
        }

        return $this->manage($voiture, $paysRepository, $request, true);
    }

    public function manage($voiture, $paysRepository, $request, $isEdit): JsonResponse
    {   
        $pays = $paysRepository->find((int)$request->get("pays"));
        if (!$pays) {
            return new JsonResponse("pays with id " . (int)$request->get("pays") . " does not exist", 203);
        }
        
        
        $voiture->setUp(
            $pays,
            $request->get("model"),
            $request->get("type"),
            (int)$request->get("prix")
        );
        
        

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($voiture);
        $entityManager->flush();

        return new JsonResponse($voiture, 200);
    }

    /**
     * @Route("/delete", methods={"POST"})
     */
    public function delete(Request $request, EntityManagerInterface $entityManager, VoitureRepository $voitureRepository): JsonResponse
    {
        $voiture = $voitureRepository->find((int)$request->get("id"));

        if (!$voiture) {
            return new JsonResponse(null, 200);
        }

        $entityManager->remove($voiture);
        $entityManager->flush();

        return new JsonResponse([], 200);
    }

    /**
     * @Route("/deleteAll", methods={"POST"})
     */
    public function deleteAll(EntityManagerInterface $entityManager, VoitureRepository $voitureRepository): Response
    {
        $voitures = $voitureRepository->findAll();

        foreach ($voitures as $voiture) {
            $entityManager->remove($voiture);
            $entityManager->flush();
        }

        return new JsonResponse([], 200);
    }
    
}
