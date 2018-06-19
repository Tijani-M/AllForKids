<?php
/**
 * Created by PhpStorm.
 * User: G534616
 * Date: 16/06/2018
 * Time: 11:22
 */


// src/AppBundle/Form/RegistrationType.php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('telephone', null, array(
            'required' => true,
            'label'=>'Contact téléphonique',
            'attr' => array(
                'placeholder' => 'Portable',
                'class' => 'form-control',
                'type'=>'numeric',
                'maxlength'=>'10',
            )));

        $builder->add('datenaissance', DateType::class, array(
            'label'=> 'Date de naissance',
            'placeholder' => array('year'=>'Annee','month'=>'Mois','day'=>'Jour'),
            'years' => range(date('Y') - 80, date('Y') - 18)
            )
        );

        $builder->add('nbEnfant', null, array(
            'required' => true,
            'label'=>'Nombre Enfant',
            'attr' => array(
                'class' => 'form-control',
                'type'=>'numeric',
                'maxlength'=>'2',
            )));

        $builder->add('genre', ChoiceType::class,array(
            'choices' => array(
            'Male' => 'm',
            'Femelle' => 'f'),
            'expanded' => true,
            'multiple' => false
        ));

        $builder->add('profession', null, array(
                'label'=>'Profession',
            ));

        $builder->add('imageFileUser',FileType::class, array(
            "label"=>"Photo Profile",
            'required' => false
        ));
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    // For Symfony 2.x
    public function getName()
    {
        return $this->getBlockPrefix();
    }
}