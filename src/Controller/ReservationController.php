<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Hotel; 
use App\Form\ReservationType; 
use App\Entity\Reservation; 
use Symfony\Component\HttpFoundation\Request;
use Mediumart\Orange\SMS\SMS;
use Mediumart\Orange\SMS\Http\SMSClient;


class ReservationController extends AbstractController
{
    /**
     * @Route("/reservation", name="app_reservation")
     */
    public function index(): Response
    {
        return $this->render('reservation/index.html.twig', [
            'controller_name' => 'ReservationController',
        ]);
    }

     /**
     * @Route("/add_Reservation/{idhotel}", name="addreservation")
     */
    public function addReservation(Request  $request, Hotel $idhotel) {

        $Reservation = new Reservation();
        $Reservation->setIdhotel($idhotel);  // construct vide
        
    
        $form = $this->createForm(ReservationType::class,$Reservation);
        $form->handleRequest($request);
         
      
        if($form->isSubmitted() && $form->isValid()) {
            
            $em = $this->getDoctrine()->getManager();

           
            $em->persist($Reservation);

            
            $em->flush(); //push table
            // Page ely fiha table ta3 affichage
            $client = SMSClient::getInstance('2Yf3CBy0mWhiS0TcVCWonAOkEUXs6cLF', 'Bgflgfsi6lEN1e2V');
            $sms = new SMS($client);
            $sms->message('Salut '.',
        puisque vous etes l administrateur  nous vous informons que qu un post s est ajoute ')
        ->from('+21651464577')
        ->to('+21651464577')
        ->send();

            return $this->redirectToRoute('afficherhotelfront'); // yhezo lel page ta3 affichage
        }
        return $this->render('reservation/ajouterReservation.html.twig',array('f'=>$form->createView())); // yab9a fi form

    }
    /**
     * @Route("/supprimer_reservation/{id}", name="suppressionR")
     */
    public function  supprimerReservation($id) {
        $em= $this->getDoctrine()->getManager();
        $i = $em->getRepository(Reservation::class)->find($id);

        $em->remove($i);
        $em->flush();

        return $this->redirectToRoute('afficherreservation');

    }

/**
     * @Route("/afficherreservation", name="afficherreservation") 
     */
    public function reservationadmin(?string $string, Request $request)
    {
        $Reservation = $this->getDoctrine()->getManager()->getRepository(Reservation::class)->findAll(); 
      

        return $this->render("reservation/afficherreservation.html.twig",array("Reservation"=>$Reservation));

    
    
}
/**
     * @Route ("/modifierR/{id}", name="modifierR")
     */
    public function modifierReservation(Request $req,$id)
    {
        
        $Reservation=$this->getDoctrine()->getRepository(Reservation::class)->find($id);
        $form=$this->createForm(ReservationType::class,$Reservation);
        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid())
        {
            $a=$this->getDoctrine()->getManager();
            $a->flush();
            return $this->redirectToRoute('afficherreservationFront');
        }
        return $this->render('reservation/modifierreservation.html.twig',array('f'=>$form->createView()));
    }

    /**
     * @Route("/afficherreservationFront", name="afficherreservationFront") 
     */
    public function reservation(?string $string, Request $request)
    {
        $Reservation = $this->getDoctrine()->getManager()->getRepository(Reservation::class)->findAll(); 
      

        return $this->render("reservation/afficherreservationfront.html.twig",array("Reservation"=>$Reservation));

    
    
}
/**
     * @Route("/tri", name="tri")
     */
    public function Tri()
    {
       
        $e= $this->getDoctrine()->getRepository(reservation::class)->TriParage();
        return $this->render("reservation/tri.html.twig",array('e'=>$e));
    }

}
