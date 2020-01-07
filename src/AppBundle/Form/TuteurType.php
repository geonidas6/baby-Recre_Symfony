<?php

namespace AppBundle\Form;

use AppBundle\Entity\Tuteur;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TuteurType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom',Type\TextType::class,[
            'required'=>true,
            'label'=>'',
            'attr'=>[
                'class'=>"form-control"
            ]
        ])
            ->add('prenom',Type\TextType::class,[
                'required'=>true,
                'label'=>'Prenom',
                'attr'=>[
                    'class'=>"form-control",
                ]
            ])
            ->add('telwhat',
                Type\TelType::class,[
            'required'=>true,
            'label'=>'telwhat',
            'attr'=>[
                'class'=>"form-control",
                'type'=>'tel' ,
            ]
        ])
            ->add('tel',Type\TelType::class,[
                'required'=>true,
                'label'=>'tel',
                'attr'=>[
                    'class'=>"form-control",
                    'type'=>'tel' ,
                ]
            ])
            ->add('email',Type\EmailType::class,[
                'required'=>true,
                'label'=>'email',
                'attr'=>[
                    'class'=>"form-control",
                    'type'=>'email' ,
                ]
            ]);
        /*->add('sexe',ChoiceType::class, [
            'required'=>true,
            'choices'  => [
                'Garçon' => Tuteur::Garcon,
                'Fille' => Tuteur::Fille,
            ],
            'label' => 'sexe',
            "attr"=>[
                'class'=>"form-control",
            ]
        ])*/

    }


    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Tuteur'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_tuteur';
    }


}
