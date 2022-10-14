<?php

namespace App\Controller\Admin;

use App\Entity\Produit;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class ProduitCrudController extends AbstractCrudController
{

   

    public static function getEntityFqcn(): string
    {
        return Produit::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title', 'Titre'),
            TextareaField::new('description')->setMaxLength(20),
            TextField::new('Couleur'),
            ChoiceField::new('taille')->setChoices([
                'Xs' => 'xs',
                'S' => 's',
                'M' => 'm',
                'L' => 'l',
                'XL' => 'xl',
                'XXL' => 'xxl',
                'XXXL' => 'xxxl',

            ]),
            ChoiceField::new('collection')->setChoices([
                'Homme' => 'h',
                'Femme' => 'f',
                'Enfant' => 'e'
            ]),
            TextField::new('photo'),
            MoneyField::new('prix'),
            IntegerField::new('stock'),
            DateTimeField::new('date_enregistrement')->setFormat("d/M/Y à H:m:s")
        ];
    }

    public function createEntity(string $entityFqcn)
    {
        $produit = new $entityFqcn;
        $produit->setCreatedAt(new \DateTime);
        return $produit;
    }

    
    
}
