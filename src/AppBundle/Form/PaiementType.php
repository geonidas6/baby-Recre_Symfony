<?php

namespace AppBundle\Form;

use AppBundle\Entity\Paiement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PaiementType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('datepaiement',Type\TextType::class,[
            'required'=>true,
            'label'=>' ',
            'attr'=>[
                'class'=>"form-control",
            ]
        ])
            ->add('sommeapayer',Type\IntegerType::class,[
                'required'=>true,
                'label'=>' ',
                'attr'=>[
                    'class'=>"form-control",
                ]
            ])
            ->add('montantregler',Type\IntegerType::class,[
                'required'=>true,
                'label'=>' ',
                'attr'=>[
                    'class'=>"form-control",
                ]
            ])
            ->add('restapayer',Type\IntegerType::class,[
                'required'=>true,
                'label'=>' ',
                'attr'=>[
                    'class'=>"form-control",
                ]
            ])
            ->add('enfant')
            ->add('numeropaiement',Type\IntegerType::class,[
                'required'=>true,
                'label'=>' ',
                'attr'=>[
                    'class'=>"form-control",
                ]
            ])
        ->add('type',ChoiceType::class, [
            'choices'  => [
               /* '-' => '',
                'ASSURANCE' => Paiement::ASSURANCE,
                'SCOLARITE' => Paiement::SCOLARITE,
                'INSCRIPTION' => Paiement::INSCRIPTION,*/
            ],
            'label' => ' ',
            "attr"=>[
                'class'=>"form-control"]
        ]);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Paiement'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_paiement';
    }


}
