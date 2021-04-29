<?php

namespace App\Form;

use App\Entity\Event;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class,[
                'label' => "Titre de l'evenement",
                'attr' => [
                    'class' => 'form-control' 
                ]
            ])
            ->add('start', DateType::class, [
                'attr' => [
                    'class' => 'form-control'
                ] ,
                'label' => "Date de l'evennement" ,
                'required' => true,
                'widget' => 'single_text',
                // 'format' => "dd-mm-yyyy"
                // 'empty_data' => '',
                // 'by_reference' => true,
            ])
            ->add('backgroundcolor' , ColorType::class, [
                'label' => "color ",
                'mapped' => true,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('allday' ,  ChoiceType::class , [
                'required'=>true,
                'label'  => "Evenement hebdomadaire",
                'attr'=>[
                    'class'=>'form-control',
                ],
                'choices'  => [
                    "OUI" => true,
                    "NON" => false,
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Event::class,
        ]);
    }
}
