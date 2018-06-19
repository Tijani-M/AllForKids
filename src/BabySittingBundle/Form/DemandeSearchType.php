<?php

namespace BabySittingBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class DemandeSearchType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('adresse',
                EntityType::class ,
                array("class"=> "BabySittingBundle\Entity\Demande",
                    "placeholder" => "Choisissez votre localité"))
        ;
    }


}