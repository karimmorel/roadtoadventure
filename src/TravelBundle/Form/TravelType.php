<?php

namespace TravelBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TravelType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('name', null, array(
            'label' => 'Nom'
        ))
        ->add('city', EntityType::class, array(
            'label' => 'Ville',
            'class' => 'TravelBundle:City',
            'choice_label' => 'name',
            'choice_value' => 'id'
            ))
        ->add('link', null, array(
            'label' => 'Lien'
        ))
        ->add('description', null, array(
            'label' => 'Description'
        ))
        ->add('position', null, array(
            'label' => 'Position'
        ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TravelBundle\Entity\Travel'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'travelbundle_travel';
    }


}
