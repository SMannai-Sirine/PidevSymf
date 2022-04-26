<?php

namespace App\Form;

use App\Entity\Vol;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VolType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('refavion',null ,[
                'label'=>'Référence de l\'avion'
            ])
            ->add('compagnieaerienne',null ,[
            'label'=>'Compagnie aérienne'
            ])
            ->add('aerodepart',null ,[
                'label'=>'Aéroport de départ'
            ])
            ->add('aeroarrive',null ,[
                'label'=>'Aéroport d\'arrivé'
            ])
            ->add('datedepart', DateType::class,[
                'label'=>'Date de départ',
                'widget'=>'choice'
            ])
            ->add('duree',null ,[
                'label'=>'Durée du vol'
            ])
            ->add('nbsieges',null ,[
                'label'=>'Nombre de sièges disponible'
            ])
            ->add('prix',null ,[
                'label'=>'Prix'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vol::class,
        ]);
    }
}
