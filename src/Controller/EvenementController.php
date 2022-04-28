<?php

namespace App\Controller;

use App\Entity\Evenement;
use App\Form\EvenementType;
use App\Repository\EvenementRepository; 
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Serializer;  
 use Symfony\Component\Serializer\Normalizer; 
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
            return $this->render('evenement/index.html.twig', [
                'evenements' => $evenementRepository->findAll(),
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


    















  
}
