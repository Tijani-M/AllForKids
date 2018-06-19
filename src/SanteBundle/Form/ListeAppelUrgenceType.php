<?php

namespace SanteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ListeAppelUrgenceType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelleNumUrgence',TextType::class,array("label"=>"Libellé"))
            ->add('NumUrgence',TextType::class,array("label"=>"Numéro"))
            ->add('imageFile',FileType::class,array("label"=>"Logo"));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SanteBundle\Entity\ListeAppelUrgence'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'santebundle_listeappelurgence';
    }


}
