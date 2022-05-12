<?php

namespace App\Form;

use App\Entity\Pays;
use App\Entity\Taxi;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TaxiType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('matricule')
            ->add('prix')
            ->add('idPays',EntityType::class,[
                'label'=>"Pays",
                'class'=>Pays::class,
                'choice_label'=>"nom"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Taxi::class,
        ]);
    }
}
