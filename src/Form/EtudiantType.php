<?php

namespace App\Form;
use App\Entity\Chambre;
use App\Entity\Etudiant;
use App\Entity\TypeEtudiant;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EtudiantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
           // ->add('MatriculeEtudiant')
            ->add('PrenomEtudiant')
            ->add('NomEtudiant')
            ->add('MailEtudiant')
            ->add('TelEtudiant')
            ->add('NaissanceEtudiant')
            ->add('TypeEtudiant',EntityType::class,[
                'class' => TypeEtudiant::class,
                'choice_label' => 'NomTypeEtudiant'
            ])
            ->add('Chambre',EntityType::class,[
                'class' => Chambre::class,
                'choice_label' => 'id'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Etudiant::class,
        ]);
    }
}
