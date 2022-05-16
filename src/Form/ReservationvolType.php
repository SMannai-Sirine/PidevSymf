<?php

namespace App\Form;

use App\Entity\Reservationvol;
use App\Entity\Users;
use App\Entity\Vol;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationvolType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('idu',EntityType::class,[
                'label'=>"Utilisateur",
                'class'=>Users::class,
                'choice_label'=>'email',
                'multiple'=>false
            ])
            ->add('idvol',EntityType::class,[
                'label'=>"Vol",
                'class'=>Vol::class,
                'choice_label'=>'refavion',
                'multiple'=>false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservationvol::class,
        ]);
    }
}
