<?php

namespace App\Controller\Admin;

use App\Entity\Commande;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CommandeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Commande::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            IdField::new('id_membre'),
            IdField::new('id_commande'),
            IntegerField::new('quantite'),
            IntegerField::new('montant'),
            ChoiceField::new('etat')->setChoices([
                'En cours de traitement' => 'en cours de traitement',
                'Envoyé' => 'envoyé',
                'Livré' => 'livré'
            ]),
            DateTimeField::new('date_enregistrement')->setFormat("d/M/Y à H:m:s")
        ];
        
        
    }

    public function createEntity(string $entityFqcn)
    {
        $commande = new $entityFqcn;
        $commande->setCreatedAt(new \DateTime);
        return $commande;
    }
    
}
