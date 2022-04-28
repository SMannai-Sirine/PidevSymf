<?php

namespace App\Controller;

use App\Entity\Vol;
use App\Form\VolType;
use App\Repository\ReservationVolRepository;
use App\Repository\VolRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/vol")
 */
class VolController extends AbstractController
{
    /**
     * @Route("/", name="app_vol_index", methods={"GET"})
     */
    public function index(VolRepository $volRepository): Response
    {
        return $this->render('vol/index.html.twig', [
            'vols' => $volRepository->findAll(),
        ]);
    }

    /**
     * @Route("/index", name="app_vol_index_front", methods={"GET"})
     */
    public function indexFront(ReservationVolRepository $reservationVolRepository,VolRepository $volRepository): Response
    {
        $vols=$volRepository->findAll();
        foreach ($vols as $item){
            $reserva=$reservationVolRepository->findOneBy(['idvol'=>$item->getIdvol(),'idu'=>1]);
            if(empty($reserva)){
                $item->setIsReserved(0);
            }else{
                $item->setIsReserved(1);
            }
        }
        return $this->render('vol/indexFront.html.twig', [
            'vols' => $vols,
        ]);
    }

    /**
     * @Route("/new", name="app_vol_new", methods={"GET", "POST"})
     */
    public function new(Request $request, VolRepository $volRepository): Response
    {
        $vol = new Vol();
        $form = $this->createForm(VolType::class, $vol);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $volRepository->add($vol);
            return $this->redirectToRoute('app_vol_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('vol/new.html.twig', [
            'vol' => $vol,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idvol}/show", name="app_vol_show", methods={"GET"})
     */
    public function show(Vol $vol): Response
    {
        return $this->render('vol/show.html.twig', [
            'vol' => $vol,
        ]);
    }

    /**
     * @Route("/{idvol}/edit", name="app_vol_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Vol $vol, VolRepository $volRepository): Response
    {
        $form = $this->createForm(VolType::class, $vol);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $volRepository->add($vol);
            return $this->redirectToRoute('app_vol_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('vol/edit.html.twig', [
            'vol' => $vol,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idvol}/del", name="app_vol_delete", methods={"POST"})
     */
    public function delete(Request $request, Vol $vol, VolRepository $volRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$vol->getIdvol(), $request->request->get('_token'))) {
            $volRepository->remove($vol);
        }

        return $this->redirectToRoute('app_vol_index', [], Response::HTTP_SEE_OTHER);
    }

    /**
     * @Route("/searchVolajax", name="ajaxVol")
     */
    public function searchajax(ReservationVolRepository $reservationVolRepository,Request $request ,VolRepository $volRepository)
    {
        $requestString=$request->get('searchValue');
        $vols = $volRepository->findVolBy($requestString);

        foreach ($vols as $item){
            $reserva=$reservationVolRepository->findOneBy(['idvol'=>$item->getIdvol(),'idu'=>1]);
            if(empty($reserva)){
                $item->setIsReserved(0);
            }else{
                $item->setIsReserved(1);
            }
        }
        return $this->render('vol/ajax.html.twig', [
            "vols"=>$vols,
        ]);
    }
}
