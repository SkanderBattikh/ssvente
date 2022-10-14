<?php

namespace App\Controller\Admin;

use App\Entity\Membre;
use App\Entity\Produit;
use App\Entity\Commande;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Ssvente');
    }

    public function configureMenuItems(): iterable
    {
        return [
        
        MenuItem::linkToDashboard('Accueil', 'fa fa-home'),
        MenuItem::section('site'),
        MenuItem::section('Membres'),
        MenuItem::linkToCrud('Utilisateurs', 'fa fa-user', Membre::class),
        MenuItem::linkToCrud('Produits', 'fas fa-newspaper', Produit::class),
        // MenuItem::linkToCrud('commandes', 'fas fa-cash-register', Commande::class),
        

    ];
        

    }

    
}
