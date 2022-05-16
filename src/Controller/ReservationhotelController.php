<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Hotel; 
use App\Form\ReservationhotelType; 
use App\Entity\Reservationhotel; 
use Symfony\Component\HttpFoundation\Request;
use Mediumart\Orange\SMS\SMS;
use Mediumart\Orange\SMS\Http\SMSClient;


class ReservationhotelController extends AbstractController
{
    /**
     * @Route("/reservation", name="app_reservation")
     */
    public function index(): Response
    {
        return $this->render('reservationhotel/index.html.twig', [
            'controller_name' => 'ReservationController',
        ]);
    }

     /**
     * @Route("/add_Reservation/{idhotel}", name="addreservation")
     */
    public function addReservation(Request  $request, Hotel $idhotel) {

        $Reservation = new Reservationhotel();
        $Reservation->setIdhotel($idhotel);  // construct vide
        
    
        $form = $this->createForm(ReservationhotelType::class,$Reservation);
        $form->handleRequest($request);
         
      
        if($form->isSubmitted() && $form->isValid()) {
            
            $em = $this->getDoctrine()->getManager();

           
            $em->persist($Reservation);

            
            $em->flush(); //push table
            // Page ely fiha table ta3 affichage
            $client = SMSClient::getInstance('nEoxkRRL52MtHzUNAoaXc0ngnNVl9KDC', 'zSB1YIu2CSwoLnBL');
            $sms = new SMS($client);
            $sms->message('Salut '.',
        puisque vous etes l administrateur une réservation a ete affecté ')
        ->from('+21654302753')
        ->to('+21658303343')
        ->send();

            return $this->redirectToRoute('afficherhotelfront'); // yhezo lel page ta3 affichage
        }
        return $this->render('reservationhotel/ajouterReservation.html.twig',array('f'=>$form->createView())); // yab9a fi form

    }
    /**
     * @Route("/supprimer_reservation/{id}", name="suppressionR")
     */
    public function  supprimerReservation($id) {
        $em= $this->getDoctrine()->getManager();
        $i = $em->getRepository(Reservationhotel::class)->find($id);

        $em->remove($i);
        $em->flush();

        return $this->redirectToRoute('afficherreservation');

    }

/**
     * @Route("/afficherreservation", name="afficherreservation") 
     */
    public function reservationadmin(?string $string, Request $request)
    {
        $Reservation = $this->getDoctrine()->getManager()->getRepository(Reservationhotel::class)->findAll(); 
      

        return $this->render("reservationhotel/afficherreservation.html.twig",array("Reservation"=>$Reservation));

    
    
}
/**
     * @Route ("/modifierR/{id}", name="modifierR")
     */
    public function modifierReservation(Request $req,$id)
    {
        
        $Reservation=$this->getDoctrine()->getRepository(Reservationhotel::class)->find($id);
        $form=$this->createForm(ReservationhotelType::class,$Reservation);
        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid())
        {
            $a=$this->getDoctrine()->getManager();
            $a->flush();
            return $this->redirectToRoute('afficherreservationFront');
        }
        return $this->render('reservationhotel/modifierreservation.html.twig',array('f'=>$form->createView()));
    }

    /**
     * @Route("/afficherreservationFront", name="afficherreservationFront") 
     */
    public function reservation(?string $string, Request $request)
    {
        $Reservation = $this->getDoctrine()->getManager()->getRepository(Reservationhotel::class)->findAll(); 
      

        return $this->render("reservationhotel/afficherreservationfront.html.twig",array("Reservation"=>$Reservation));

    
    
}
/**
     * @Route("/tri", name="tri")
     */
    public function Tri()
    {
       
        $e= $this->getDoctrine()->getRepository(reservationhotel::class)->TriParage();
        return $this->render("reservationhotel/tri.html.twig",array('e'=>$e));
    }

}
