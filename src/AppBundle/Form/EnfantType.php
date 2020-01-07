<?php

namespace AppBundle\Form;

use AppBundle\Entity\Enfant;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EnfantType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('image',  Type\FileType::class, array('mapped'=>false,'label'=>' '));

        /*->add('nom',Type\TextType::class,[
            'required'=>true,
            'label'=>'',
            'attr'=>[
                'class'=>"form-control"
                ,'data-validate-length-range'=>'6',
                'data-validate-words'=>'1' ,
                'placeholder'=>'ex. John',
                'required'=>true,
            ]
        ])
            ->add('prenom',Type\TextType::class,[
                'required'=>true,
                'label'=>'Prenom',
                'attr'=>[
                    'class'=>"form-control",
                    'data-validate-length-range'=>'6',
                    'data-validate-words'=>'' ,
                    'placeholder'=>'ex. John K Noel '
                ]
            ])
            ->add('datenaissance',Type\TextType::class,[
                'required'=>true,
                'label'=>'Date de naissance',
                'attr'=>[
                    'class'=>"form-control",
                ]
            ])
            ->add('sexe',ChoiceType::class, [
                'required'=>true,
            'choices'  => [
                'Garçon' => Enfant::Garcon,
                'Fille' => Enfant::Fille,
            ],
            'label' => 'sexe',
            "attr"=>[
                'class'=>"form-control",
                ]
        ])*/

    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Enfant'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_enfant';
    }


}
