<?php

namespace App\Controller;

use App\Entity\Reservationvol;
use App\Entity\Vol;
use App\Form\ReservationvolType;
use App\Repository\ReservationVolRepository;
use App\Repository\UsersRepository;
use App\Repository\VolRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

/**
 * @Route("/reservationvol")
 */
class ReservationvolController extends AbstractController{


    /**
     * @Route("/", name="app_reservationvol_index", methods={"GET"})
     */
    public function index(NormalizerInterface $Normalizer, VolRepository $volRepository,ReservationVolRepository $reservationVolRepository): Response
    {
        $reservations= $reservationVolRepository->findBy(['idu'=>1]);
        foreach ($reservations as $item){
            $vol=$volRepository->find($item->getIdvol());
            $item->setVol($vol);

        }
        $date=new \DateTime();

       return $this->render('reservationvol/index.html.twig', [
            'reservationvols' =>$reservations,'date'=>$date
        ]);

        //$jsonContent = $Normalizer->normalize($reservations, 'json', ['groups'=>'post:read']);
        //return new Response(json_encode($jsonContent));
    }

    //*****MOBILE

    /**
     * @Route("/mobile/aff", name="affmobres")
     */
    public function affmobres(NormalizerInterface $Normalizer, VolRepository $volRepository,ReservationVolRepository $reservationVolRepository)
    {
        $reservations= $reservationVolRepository->findBy(['idu'=>1]);
        foreach ($reservations as $item){
            $vol=$volRepository->find($item->getIdvol());
            $item->setVol($vol);

        }
        $date=new \DateTime();



        $jsonContent = $Normalizer->normalize($reservations, 'json', ['groups'=>'post:read']);
        return new Response(json_encode($jsonContent));
    }

    /**
     * @Route("/Admin", name="app_reservationvol_Admin", methods={"GET"})
     */
    public function indexAdmin(ReservationVolRepository $reservationVolRepository): Response
    {
        return $this->render('reservationvol/indexAdmin.html.twig', [
            'reservationvols' => $reservationVolRepository->findAll(),
        ]);
    }

    /**
     * @Route("/home", name="app_reservationvol_home", methods={"GET"})
     */
    public function home(ReservationVolRepository $reservationVolRepository): Response
    {
        return $this->render('reservationvol/home.html.twig');
    }

    /**
     * @Route("/new/{idvol}", name="app_reservationvol_new", methods={"GET", "POST"})
     */
    public function new( $idvol, ReservationVolRepository $reservationVolRepository,VolRepository $volRepository): Response
    {

        $reservationvol = new Reservationvol();
        $reservationvol->setIdvol($idvol);
        $reservationvol->setIdu(1);
        $reservationVolRepository->add($reservationvol);

        $vol=$volRepository->find($reservationvol->getIdvol());
        $volRepository->decrementerNbSieges($vol);

        $id=$reservationvol->getIdreservationvol();
            return $this->redirectToRoute('app_reservationvol_show', ['idreservationvol'=>$id], Response::HTTP_SEE_OTHER);



    }

    /**
     * @Route("/{idreservationvol}", name="app_reservationvol_show", methods={"GET"})
     */
    public function show(UsersRepository $userRepository,VolRepository $volRepository,Reservationvol $reservationvol): Response
    {
        $vol=$volRepository->find($reservationvol->getIdvol());
        $reservationvol->setVol($vol);

        $user=$userRepository->find($reservationvol->getIdu());
        $reservationvol->setUser($user);

/*
        $qrCode = $qrCodeService->qrcode("your reservation id is : #".$reservationvol->getIdreservationvol());

        $reservationvol->setQrcode($qrCode);*/

       /* $qrcode=$qrcodeService->qrcodes("your reservation id is : #".$reservationvol->getIdreservationvol());
*/
        //$test="your reservation id is : #".$reservationvol->getIdreservationvol();
        return $this->render('reservationvol/show.html.twig', [
            'reservationvol' => $reservationvol
            //'message'=>$test
        ]);
    }

    /**
     * @Route("/Admin/{idreservationvol}", name="app_reservationvol_show_admin", methods={"GET"})
     */
    public function showAdmin(UsersRepository $userRepository,VolRepository $volRepository,Reservationvol $reservationvol): Response
    {
        $vol=$volRepository->find($reservationvol->getIdvol());
        $reservationvol->setVol($vol);

        $user=$userRepository->find($reservationvol->getIdu());
        $reservationvol->setUser($user);



        return $this->render('reservationvol/showAdmin.html.twig', [
            'reservationvol' => $reservationvol,
        ]);
    }

    /**
     * @Route("/{idreservationvol}/edit", name="app_reservationvol_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Reservationvol $reservationvol, ReservationVolRepository $reservationVolRepository): Response
    {
        $form = $this->createForm(ReservationvolType::class, $reservationvol);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $reservationVolRepository->add($reservationvol);
            return $this->redirectToRoute('app_reservationvol_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('reservationvol/edit.html.twig', [
            'reservationvol' => $reservationvol,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idreservationvol}", name="app_reservationvol_delete", methods={"POST"})
     */
    public function delete(Request $request,VolRepository $volRepository, Reservationvol $reservationvol, ReservationVolRepository $reservationVolRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reservationvol->getIdreservationvol(), $request->request->get('_token'))) {
            $reservationVolRepository->remove($reservationvol);

            $vol=$volRepository->find($reservationvol->getIdvol());
            $volRepository->incrementerNbSieges($vol);
        }
        $reservationVolRepository->remove($reservationvol);

        $vol=$volRepository->find($reservationvol->getIdvol());
        $volRepository->incrementerNbSieges($vol);

        return $this->redirectToRoute('app_reservationvol_index', [], Response::HTTP_SEE_OTHER);
    }

    /**
     * @Route("/mobile", name="app_reservationvol_index_mobile", methods={"GET"})
     */
    public function index1(NormalizerInterface $Normalizer, VolRepository $volRepository,ReservationVolRepository $reservationVolRepository): Response
    {
        $reservations= $reservationVolRepository->findBy(['idu'=>1]);
        foreach ($reservations as $item){
            $vol=$volRepository->find($item->getIdvol());
            $item->setVol($vol);

        }
        

        $jsonContent = $Normalizer->normalize($reservations, 'json', ['groups'=>'post:read']);
        return new Response(json_encode($jsonContent));
    }
}
