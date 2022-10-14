<?php

namespace App\Controller;

use App\Entity\Produit;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    #[Route('/', name: 'site')]
    public function index(): Response
    {
        return $this->render('app/index.html.twig', [
            'controller_name' => 'AppController',
        ]);
    }

    #[Route('/accueil', name: 'accueil')]
    public function home(): Response
    {
        return $this->render('app/accueil.html.twig', [
            'controller_name' => 'AppController',
        ]);
    }

    #[Route("/produits", name:"tshirt")]
    public function produits(): Response
    {
       

        return $this->render('app/produit.html.twig', [
            'controller_name' => 'AppController',
           
        ]);
    }

    #[Route("/produits/show/", name:"tshirt_show")]
    public function show()
    {
        return $this->render('app/show.html.twig');
    }

    #[Route('/membres', name: 'membre')]
    public function membres(): Response
    {
        return $this->render('app/membre.html.twig', [
            'controller_name' => 'AppController',
        ]);
    }


    
}

