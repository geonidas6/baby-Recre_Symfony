<?php

namespace AppBundle\Form;

use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CrecheType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('heureOuverture',Type\TextType::class,[
        'required'=>true,
            'label'=>"Heure d'ouverture "
    ])
            ->add('nome',Type\TextType::class,[
                'required'=>true,
                'label'=>"Nom "
            ])
            ->add('heurFermeture',Type\TextType::class,[
                'required'=>true,
                'label'=>"Heure de Fermeture "
            ])
            ->add('assurance',Type\IntegerType::class,[
                'required'=>true,
                'label'=>'Assurance'
            ])
            ->add('scolarite',Type\IntegerType::class,[
                'required'=>true,
                'label'=>"Scolarité "
            ])
            ->add('fraisinscription',Type\IntegerType::class,[
                'required'=>true,
                'label'=>"Frais d'inscription "
            ])
            ->add('tel',Type\TextType::class,[
                'required'=>true,
                'label'=>"Tel"
            ])
            ->add('situation',Type\TextType::class,[
                'required'=>true,
                'label'=>"Situation "
            ])
            ->add('email',Type\EmailType::class,[
                'required'=>true,
                'label'=>"Email "

            ])
            ->add('dateCreation',Type\TextType::class,[
                'required'=>true,
                'label'=>"Date de création "
            ])
           ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Creche'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_creche';
    }


}