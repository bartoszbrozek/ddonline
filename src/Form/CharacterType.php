<?php

namespace App\Form;

use App\Entity\Alignment;
use App\Entity\GameCharacter;
use App\Entity\CharacterClass;
use App\Entity\Race;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CharacterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'required' => true
            ])
            ->add('level', IntegerType::class, [
                'required' => true
            ])
            ->add('experience', IntegerType::class, [
                'required' => true
            ])
            ->add('className', EntityType::class, [
                'class' => CharacterClass::class,
                'choice_label' => 'Class Name'
            ])
            ->add('race', EntityType::class, [
                'class' => Race::class,
                'choice_label' => 'Race'
            ])
            ->add('alignment', EntityType::class, [
                'class' => Alignment::class,
                'choice_label' => 'alignment'
            ])
            ->add('submit', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-success pull-right'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => GameCharacter::class
        ]);
    }
}