<?php

namespace AppBundle\Form;

use AppBundle\Entity\User;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lastName',Type\TextType::class, array("attr"=>array('placeholder'=>'Nom','class'=>"form-control")))
            ->add('firstName',Type\TextType::class, array("attr"=>array('placeholder'=>'Prénoms','class'=>"form-control")))
            ->add('username',Type\TextType::class, array("attr"=>array('placeholder'=>'Identifiant','class'=>"form-control")))
            ->add('plainPassword', Type\RepeatedType::class, array(
                'type' => Type\PasswordType::class,
                'invalid_message' => 'Mot de passe non identique',
                'options' => array('attr' => array('class' => 'password-field')),
                'required' => true,
                'first_options'  => array('label' => 'Mot de passe','attr'=>array('placeholder'=>'Mot de passe','class'=>"form-control")),
                'second_options' => array('label' => 'Repeat Password', 'attr'=>array('placeholder'=>'Saisir à nouveau','class'=>"form-control"))))
            ->add('email', Type\EmailType::class, array("attr"=>array('placeholder'=>'Email','class'=>"form-control")))
                ->add('tel',Type\TextType::class, [
                    'label'=>'Telephone',
                    'invalid_message' => 'Veillez rentrez un numero de telephone valide',
                    "attr"=>[
                        'class'=>"form-control",
                        'placeholder'=>"Votre numero de téléphone"
                    ]
                ])
            ->add('sexe',ChoiceType::class, [
                    'choices'  => [
                        'Homme' => User::Homme,
                        'Femme' => User::Femme,
                    ],
                    'label' => 'sexe',
                "attr"=>[
                    'class'=>"form-control"]
                ]);
    }



    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\User'
        ));
    }
}
