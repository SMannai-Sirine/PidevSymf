<?php

namespace App\Controller;

use App\Entity\Evenement;
//use App\Entity\RatingEvent;
use App\Form\EvenementType;
//use App\Form\RatingEventType;
use App\Repository\EvenementRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @Route("/evenement")
 */

class EvenementController extends AbstractController
{
    /**
     * @Route("/listevent", name="app_evenement_index", methods={"GET"})
     */
   
        public function index(EvenementRepository $evenementRepository): Response
        {
            // $ratings = $this->getDoctrine()->getRepository(RatingEvent::class)->findAll();
            $events = $this->getDoctrine()->getRepository(Evenement::class)->findAll();


           // $total = 0;
            //foreach ($ratings as $r) {
                //$total += $r->getPrix();
            //}
            $datec[] = [];

            foreach ($events as $event){
                $datec[] = [
                    'id' => $event->getidevent(),
                    'start' => $event->getdateevent()->format('Y-m-d H:i:s'),
                    'title' => $event->getintitule(),
                ];
            }

            $data = json_encode($datec);


            return $this->render('evenement/index.html.twig', [
                'evenements' => $events,
                'data' => $data,
                // 'ratings' => $ratings,
            ]);
        }

    /**
     * @Route("/new", name="app_evenement_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EvenementRepository $evenementRepository): Response
    {
        $evenement = new Evenement();
        $form = $this->createForm(EvenementType::class, $evenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $evenement->getphoto();

            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            $file->move($this->getParameter('kernel.project_dir') .'/public/Front/images',$fileName);
            $evenement->setphoto($fileName);
            $entityManager=$this->getDoctrine()->getManager();
            $entityManager->persist($evenement);
            $entityManager->flush();

            return $this->redirectToRoute('app_evenement_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('evenement/new.html.twig', [
            'evenement' => $evenement,
            'form' => $form->createView(),
        ]);
    }



    /**
     * @Route("/{idevent}", name="app_evenement_show", methods={"GET"})
     */
    public function show(Evenement $evenement): Response
    {
        return $this->render('evenement/show.html.twig', [
            'evenement' => $evenement,
        ]);
    }

    /**
     * @Route("/{idevent}/edit", name="app_evenement_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Evenement $evenement, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EvenementType::class, $evenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $evenement->getphoto();

            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            $file->move($this->getParameter('kernel.project_dir') .'/public/Front/images',$fileName);
            $evenement->setphoto($fileName);
            $entityManager->flush();

            return $this->redirectToRoute('app_evenement_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('evenement/edit.html.twig', [
            'evenement' => $evenement,
            'form' => $form->createView(),
        ]);
    }



    /**
     * @Route("/{idevent}", name="app_evenement_delete", methods={"POST"})
     */
    public function delete(Request $request, Evenement $evenement, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$evenement->getIdevent(), $request->request->get('_token'))) {
            $entityManager->remove($evenement);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_evenement_index', [], Response::HTTP_SEE_OTHER);
    }

/**
     * @Route("/e/search_event", name="search_eventt", methods={"GET"})
     */
    public function search_event(Request $request, NormalizerInterface $Normalizer, EvenementRepository $EvenementRepository): Response
    {

        $requestString = $request->get('searchValue');
        $requestString3 = $request->get('orderid');


        $events = $EvenementRepository->findEvenement($requestString, $requestString3);
        $jsoncontentc = $Normalizer->normalize($events, 'json', ['groups' => 'posts:read']);
        $jsonc = json_encode($jsoncontentc);
        if ($jsonc == "[]") {
            return new Response(null);
        } else {
            return new Response($jsonc);
        }
    }

    //*****MOBILE

    /**
     * @Route("/mobile/aff", name="affmobevent")
     */
    public function affmobevent(NormalizerInterface $normalizer)
    {
        $med=$this->getDoctrine()->getRepository(Evenement::class)->findAll();
        $jsonContent = $normalizer->normalize($med,'json',['evenement'=>'post:read']);
        return new Response(json_encode($jsonContent));
    }

    /**
     * @Route("/mobile/new", name="addmobevent")
     */
    public function addmobevent(Request $request,NormalizerInterface $normalizer,EntityManagerInterface $entityManager)
    {
        $event= new Evenement();

        $event->setIntitule($request->get('intitule'));
        $event->setAdresse($request->get('adresse'));
        $event->setTypeevent($request->get('type'));
        $event->setPaysevent($request->get('pays'));
        $event->setPhoto($request->get('photo'));

        $rest=substr($request->get('dateev'), 0, 20);
        $rest1=substr($request->get('dateev'), 30, 34);
        $res=$rest.$rest1;
        try {
            $date = new \DateTime($res);
            $event->setDateevent($date);
        } catch (\Exception $e) {

        }

        $event->setPrix($request->get('prix'));

        $entityManager->persist($event);
        $entityManager->flush();

        $jsonContent = $normalizer->normalize($event,'json',['evenement'=>'post:read']);
        return new Response(json_encode($jsonContent));
    }

    /**
     * @Route("/mobile/editevent", name="editmobevent")
     */
    public function editmobevent(Request $request,NormalizerInterface $normalizer)
    {   $em=$this->getDoctrine()->getManager();

        $event = $em->getRepository(Evenement::class)->find($request->get('id'));

        $event->setIntitule($request->get('intitule'));
        $event->setAdresse($request->get('adresse'));
        $event->setTypeevent($request->get('type'));
        $event->setPaysevent($request->get('pays'));
        $event->setPhoto($request->get('photo'));

        $rest=substr($request->get('dateev'), 0, 20);
        $rest1=substr($request->get('dateev'), 30, 34);
        $res=$rest.$rest1;
        try {
            $date = new \DateTime($res);
            $event->setDateevent($date);
        } catch (\Exception $e) {

        }

        $event->setPrix($request->get('prix'));


        $em->flush();
        $normalizer = new ObjectNormalizer();
        $normalizer->setCircularReferenceLimit(1);
        $normalizer->setCircularReferenceHandler(function ($event) {
            return $event->getidevent();
        });
        $encoders = [new JsonEncoder()];
        $normalizers = array($normalizer);
        $serializer = new Serializer($normalizers,$encoders);
        $formatted = $serializer->normalize($event);
        return new JsonResponse($formatted);
    }
    /**
     * @Route("/mobile/del", name="delmoboffre")
     */
    public function delmoboffre(Request $request,NormalizerInterface $normalizer)
    {           $em=$this->getDoctrine()->getManager();
        $event=$this->getDoctrine()->getRepository(Evenement::class)
            ->find($request->get('id'));
        $em->remove($event);
        $em->flush();
        $jsonContent = $normalizer->normalize($event,'json',['evenement'=>'post:read']);
        return new Response(json_encode($jsonContent));
    }




}
