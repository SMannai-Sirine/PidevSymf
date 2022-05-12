<?php

namespace App\Form;

use App\Entity\Reservationtaxi;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationtaxiType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('idRes')
            ->add('etat',ChoiceType::class,[
                'choices'  => [
                    'En Cours' => 'En Cours',
                    'Acceptée' => 'Acceptée',
                    'Refusée' => 'Refusée',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservationtaxi::class,
        ]);
    }
}
