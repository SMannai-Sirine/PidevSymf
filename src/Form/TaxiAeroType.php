<?php

namespace App\Form;

use App\Entity\Pays;
use App\Entity\Taxi;
use App\Entity\TaxiAero;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TaxiAeroType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('heure')
            ->add('idPays',EntityType::class,[
                'label'=>"Pays",
                'class'=>Pays::class,
                'choice_label'=>"nom"
            ])
            ->add('idTaxi',EntityType::class,[
                'label'=>"Taxi",
                'class'=>Taxi::class,
                'choice_label'=>"matricule"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TaxiAero::class,
        ]);
    }
}
