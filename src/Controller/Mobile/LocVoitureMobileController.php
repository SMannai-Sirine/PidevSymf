<?php
namespace App\Controller\Mobile;

use App\Entity\LocVoiture;
use App\Repository\LocVoitureRepository;
use App\Repository\PaysRepository;
use App\Repository\VoitureRepository;
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
 * @Route("/mobile/locVoiture")
 */
class LocVoitureMobileController extends AbstractController
{
    /**
     * @Route("", methods={"GET"})
     */
    public function index(LocVoitureRepository $locVoitureRepository): Response
    {
        $locVoitures = $locVoitureRepository->findAll();

        if ($locVoitures) {
            return new JsonResponse($locVoitures, 200);
        } else {
            return new JsonResponse([], 204);
        }
    }

    /**
     * @Route("/add", methods={"POST"})
     */
    public function add(Request $request, PaysRepository $paysRepository, VoitureRepository $voitureRepository): JsonResponse
    {
        $locVoiture = new LocVoiture();

        return $this->manage($locVoiture, $paysRepository,  $voitureRepository,  $request, false);
    }

    /**
     * @Route("/edit", methods={"POST"})
     */
    public function edit(Request $request, LocVoitureRepository $locVoitureRepository, PaysRepository $paysRepository, VoitureRepository $voitureRepository): Response
    {
        $locVoiture = $locVoitureRepository->find((int)$request->get("id"));

        if (!$locVoiture) {
            return new JsonResponse(null, 404);
        }

        return $this->manage($locVoiture, $paysRepository, $voitureRepository, $request, true);
    }

    public function manage($locVoiture, $paysRepository, $voitureRepository, $request, $isEdit): JsonResponse
    {   
        $pays = $paysRepository->find((int)$request->get("pays"));
        if (!$pays) {
            return new JsonResponse("pays with id " . (int)$request->get("pays") . " does not exist", 203);
        }
        
        $voiture = $voitureRepository->find((int)$request->get("voiture"));
        if (!$voiture) {
            return new JsonResponse("voiture with id " . (int)$request->get("voiture") . " does not exist", 203);
        }
        
        
        $locVoiture->setUp(
            $pays,
            $voiture,
            DateTime::createFromFormat("d-m-Y", $request->get("dateRes")),
            (int)$request->get("dureeRes"),
            (int)$request->get("remise"),
            (int)$request->get("tauxRemise")
        );
        
        

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($locVoiture);
        $entityManager->flush();

        return new JsonResponse($locVoiture, 200);
    }

    /**
     * @Route("/delete", methods={"POST"})
     */
    public function delete(Request $request, EntityManagerInterface $entityManager, LocVoitureRepository $locVoitureRepository): JsonResponse
    {
        $locVoiture = $locVoitureRepository->find((int)$request->get("id"));

        if (!$locVoiture) {
            return new JsonResponse(null, 200);
        }

        $entityManager->remove($locVoiture);
        $entityManager->flush();

        return new JsonResponse([], 200);
    }

    /**
     * @Route("/deleteAll", methods={"POST"})
     */
    public function deleteAll(EntityManagerInterface $entityManager, LocVoitureRepository $locVoitureRepository): Response
    {
        $locVoitures = $locVoitureRepository->findAll();

        foreach ($locVoitures as $locVoiture) {
            $entityManager->remove($locVoiture);
            $entityManager->flush();
        }

        return new JsonResponse([], 200);
    }
    
}
