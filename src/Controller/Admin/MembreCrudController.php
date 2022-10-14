<?php

namespace App\Controller\Admin;

use App\Entity\Membre;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class MembreCrudController extends AbstractCrudController
{

    public static function getEntityFqcn(): string
    {
        return Membre::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('pseudo'),
            TextField::new('password', 'Mot de passe')->setFormType(PasswordType::class)->onlyWhenCreating(),
            TextField::new('lastname', 'nom'),
            TextField::new('firstname', 'prenom'),
            TextField::new('email'),
            CollectionField::new('civilite')->setTemplatePath('admin/field/civilite.html.twig'),
            DateTimeField::new('date_enregistrement')->setFormat('d/M/Y à H:m:s')->hideOnForm(),
            CollectionField::new('roles')->setTemplatePath('/admin/field/roles.html.twig')
        ];
    }

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }
    
    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if(!$entityInstance->getId())
        {
            $entityInstance->setPassword(
                $this->hasher->hashPassword($entityInstance, $entityInstance->getPassword())
            );
        }
        $entityManager->persist($entityInstance);
        $entityManager->flush();

    }

    
}
