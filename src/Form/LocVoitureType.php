<?php

namespace App\Form;

use App\Entity\LocVoiture;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Pays;
use App\Entity\Voiture;

class LocVoitureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateRes')
            ->add('dureeRes')
            ->add('idPays',EntityType::class,[
                'label'=>"Pays",
                'class'=>Pays::class,
                'choice_label'=>"nom"
            ])
            ->add('idVoiture',EntityType::class,[
                'label'=>"Voiture",
                'class'=>Voiture::class,
                'choice_label'=>"model"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => LocVoiture::class,
        ]);
    }
}
