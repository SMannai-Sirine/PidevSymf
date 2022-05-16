<?php

namespace App\Form;

use App\Entity\Pays;
use App\Entity\Voiture;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VoitureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('model')
            ->add('type',ChoiceType::class,[
                'choices'  => [
                'Sport' => "Sport",
                'Business' => "Business",
                'Quotidien' => "Quotidien",
                    ],
            ])
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
            'data_class' => Voiture::class,
        ]);
    }
}
