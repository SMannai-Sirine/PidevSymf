<?php

namespace App\Controller;

use App\Entity\LocVoiture;
use App\Form\LocVoitureType;
use App\Repository\LocVoitureRepository;
use App\Repository\TaxiAeroRepository;
use App\Repository\TaxiRepository;
use App\Repository\VoitureRepository;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\PieChart;
use CMEN\GoogleChartsBundle\GoogleCharts\Options\PieChart\PieSlice;
use Doctrine\ORM\Query\ResultSetMapping;
use Doctrine\Persistence\ManagerRegistry;
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
     * @Route("/stat", name="loc_voiture_stat", methods={"GET"})
     */
    public function stat(VoitureRepository $voitureRepository,TaxiRepository $taxiRepository,LocVoitureRepository $locVoitureRepository,TaxiAeroRepository $taxiAeroRepository): Response
    {
        $Loc_voitures=$locVoitureRepository->CountId();
        $voitures=$voitureRepository->findAll();
        $taxi=$taxiRepository->findAll();
        $taxiAero=$taxiAeroRepository->CountId();

        $voituresModels=[];
        $voitureRes=[];
        $taxiMatricules=[];
        $taxRes=[];

        foreach($Loc_voitures as $loc){
            foreach ($voitures as $voiture){
                if($voiture->getId()==$loc["id_voiture"]){
                    array_push($voituresModels,$voiture->getModel());
                    array_push($voitureRes,$loc["res"]);
                }
            }
        }
        foreach($taxiAero as $loc){
            foreach ($taxi as $taxiItem){
                if($taxiItem->getId()==$loc["id_taxi"]){
                    array_push($taxiMatricules,$taxiItem->getMatricule());
                    array_push($taxRes,$loc["res"]);
                }
            }
        }

        return $this->render('stats.html.twig', [
            'VoituresModels' => json_encode($voituresModels),
            'VoitureRes' => json_encode($voitureRes),
            'TaxiMatricules' => json_encode($taxiMatricules),
            'TaxRes' => json_encode($taxRes),

        ]);
    }


    /**
     * @Route("/index", name="loc_index_user", methods={"GET"})
     */
    public function indexUser(LocVoitureRepository $locVoitureRepository): Response
    {
        return $this->render('loc_voiture/indexUser.html.twig', [
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
            if($locVoiture->getDureeRes()>=5){
                $locVoiture->setRemise(true);
                $locVoiture->setTauxRemise(10);
            }else{
                $locVoiture->setRemise(false);
                $locVoiture->setTauxRemise(0);
            }

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($locVoiture);
            $entityManager->flush();

            return $this->redirectToRoute('loc_index_user', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('loc_voiture/new.html.twig', [
            'loc_voiture' => $locVoiture,
            'form' => $form->createView(),
        ]);
    }



    /**
     * @Route("/edit/{id}/edit", name="loc_voiture_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, LocVoiture $locVoiture): Response
    {
        $form = $this->createForm(LocVoitureType::class, $locVoiture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('loc_voiture_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('loc_voiture/editAdmin.html.twig', [
            'loc_voiture' => $locVoiture,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/edit/{id}/editUser", name="loc_voiture_edit_user", methods={"GET","POST"})
     */
    public function editUser(Request $request, LocVoiture $locVoiture): Response
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
     * @Route("/del/{id}/del", name="loc_voiture_delete", methods={"GET","POST"})
     */
    public function delete(Request $request, LocVoiture $locVoiture): Response
    {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($locVoiture);
            $entityManager->flush();
        return $this->redirectToRoute('loc_voiture_index');
    }

    /**
     * @Route("/del/{id}/delUser", name="loc_voiture_delete_user", methods={"GET","POST"})
     */
    public function deleteUser(Request $request, LocVoiture $locVoiture): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($locVoiture);
        $entityManager->flush();
        return $this->redirectToRoute('loc_index_user');
    }

    /**
     * @Route("/{id}/show", name="loc_voiture_show", methods={"GET"})
     */
    public function Show(LocVoiture $locVoiture): Response
    {
        return $this->render('loc_voiture/index.html.twig', [
            'loc_voiture' =>$locVoiture ,
        ]);
    }


}
