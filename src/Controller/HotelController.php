<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Hotel; 
use App\Entity\Reservation; 
use App\Form\HotelType; 
use App\Repository\HotelRepository;
use App\Repository\UrlizerRepository;
use App\Entity\Urlizer;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Knp\Component\Pager\PaginatorInterface;

class HotelController extends AbstractController
{
    /**
     * @Route("/hotel", name="app_hotel")
     */
    public function index(): Response
    {
        return $this->render('hotel/index.html.twig', [
            'controller_name' => 'HotelController',
        ]);
    }
    /**
     * @Route("/add_hotel", name="addh")
     */
    public function addHotel(Request  $request,?string $string) {

        $Hotel = new Hotel(); // construct vide
    
        $form = $this->createForm(HotelType::class,$Hotel);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

           /** @var UploadedFile $uploadedFile */
           $uploadedFile = $form['image']->getData();
           $destination = $this->getParameter('kernel.project_dir').'/public/uploads';
           $originalFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
           $newFilename = Urlizer::urlize($originalFilename).'-'.uniqid().'.'.$uploadedFile->guessExtension();
           $uploadedFile->move(
               $destination,
               $newFilename
           );
            $Hotel->setImage($newFilename);

            $em = $this->getDoctrine()->getManager();
           
            $em->persist($Hotel); // commit Hotel
            $em->flush(); //push table
            // Page ely fiha table ta3 affichage

            return $this->redirectToRoute('afficherhotel'); // yhezo lel page ta3 affichage
        }
        return $this->render('hotel/ajouterhotel.html.twig',array('f'=>$form->createView())); // yab9a fi form

    }
    /**
     * @Route("/afficherhotel", name="afficherhotel") 
     */
    public function Hoteladmin(?string $string, Request $request)
    {
        $Hotel = $this->getDoctrine()->getManager()->getRepository(Hotel::class)->findAll(); 
      

        return $this->render("hotel/afficherhotel.html.twig",array("Hotel"=>$Hotel));

    
    
}
/**
     * @Route ("/modifierh/{id}", name="modifierh")
     */
    public function modifierHotel(Request $req,$id)
    {
        
        $Hotel=$this->getDoctrine()->getRepository(Hotel::class)->find($id);
        $form=$this->createForm(HotelType::class,$Hotel);
        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid())
        {
            $a=$this->getDoctrine()->getManager();
            $a->flush();
            return $this->redirectToRoute('afficherhotel');
        }
        return $this->render('hotel/modifier_Hotel.html.twig',array('f'=>$form->createView()));
    }
    /**
     * @Route("/supprimer_hotel/{id}", name="suppressionhotel")
     */
    public function  supprimerHotel($id) {
        $em= $this->getDoctrine()->getManager();
        $i = $em->getRepository(Hotel::class)->find($id);
        $h =$em->getRepository(Reservation::class)->findBy(['idhotel'=>$id]); 
         foreach($h as $Reservation) {$em->remove($Reservation);}
        $em->remove($i);
        $em->flush();
     


        return $this->redirectToRoute('afficherhotel');

    }
    /**
     * @Route("/afficherhotelF", name="afficherhotelfront") 
     */
    public function Hotelafficher(?string $string, Request $request,PaginatorInterface $paginator)
    {
        $Hotels = $this->getDoctrine()->getManager()->getRepository(Hotel::class)->findAll(); 
        $Hotels = $paginator->paginate(
            $Hotels, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
        2/*limit per page*/);
        // select * from product
        $Reservations=[]; 
        foreach($Hotels as $Hotel) 
        { 
            $hotelid = $Hotel->getId();
            $Reservations[strval($hotelid)] = $this->getDoctrine()->getManager()->getRepository(Reservation::class)->findBy(['idhotel' => $Hotel->getId()]);//strval recupére postid comme chaine de caractére pour qu'il peut acceder avec au tableau 
            
            
        }
      

        return $this->render("hotel/afficherhotelFront.html.twig",array("Hotels"=>$Hotels,"Reservation"=>$Reservations));

    
    
}
 /**
     * @Route("/map", name="map") 
     */
    public function map()
    {
     return $this->render("hotel/map.html.twig");
}

}
