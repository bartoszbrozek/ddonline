<?php

namespace App\Form;

use App\Entity\Alignment;
use App\Entity\GameCharacter;
use App\Entity\CharacterClass;
use App\Entity\Gender;
use App\Entity\Race;
use App\Entity\Speech;
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
            ->add('gender', EntityType::class, [
                'class' => Gender::class,
                'choice_label' => 'Gender'
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
            ->add('speeches', null, [
                'required' => true,
                'multiple' => true,
                'expanded' => true,
                'class' => 'App:Speech'
            ])
            ->add('hitPoints', IntegerType::class, [
                'required' => true
            ])
            ->add('strength', IntegerType::class, [
                'required' => true
            ])
            ->add('dexterity', IntegerType::class, [
                'required' => true
            ])
            ->add('constitution', IntegerType::class, [
                'required' => true
            ])
            ->add('intelligence', IntegerType::class, [
                'required' => true
            ])
            ->add('wisdom', IntegerType::class, [
                'required' => true
            ])
            ->add('charisma', IntegerType::class, [
                'required' => true
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