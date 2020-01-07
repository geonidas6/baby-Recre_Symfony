<?php

namespace AppBundle\Form;

use AppBundle\Entity\Vaccin;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;



class VaccinType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',Type\TextType::class,[
            'required'=>true,
            'label'=>'CODE VACCIN',
            'attr'=>[
                'class'=>"form-control",
                'placeholder'=>'ex. DCaT-HB-VPI-Hib '
            ]
        ])
            ->add('timeintervale',Type\IntegerType::class,[
            'required'=>true,
            'label'=>' ',
            'attr'=>[
                'class'=>"form-control",
                'placeholder'=>'Nombre de jour , mois ou année ',
            ]])
            ->add('libele',ChoiceType::class, [
            'choices'  => [
                'JOUR' => Vaccin::Naissance,
                'Week' => Vaccin::Week,
                'Year' => Vaccin::Year,
            ],
            'label' => ' ',
            "attr"=>[
                'class'=>"form-control"]
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Vaccin'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_vaccin';
    }


}
