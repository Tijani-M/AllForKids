<?php

namespace ScolariteBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class ParascolaireSearchType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type',
                EntityType::class ,
                    array("class"=> "ScolariteBundle\Entity\TypePara",
                    "placeholder" => "Choisissez un type de parascolare"))
            ->add('matiere',
                EntityType::class ,
                array("class"=> "ScolariteBundle\Entity\Matiere",
                    "placeholder" => "Choisissez une matière"))
            ;
    }


}
