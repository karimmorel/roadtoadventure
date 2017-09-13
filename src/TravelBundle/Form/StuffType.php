<?php

namespace TravelBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class StuffType extends AbstractType
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
        ->add('priority', null, array(
            'label' => 'Priorité'
        ))
        ->add('minPrice', null, array(
            'label' => 'Prix Recherché'
        ))
        ->add('price', null, array(
            'label' => 'Prix Moyen'
        ))
        ->add('link', null, array(
            'label' => 'Lien',
            'required' => false
        ))
        ->add('informations', null, array(
            'label' => 'Informations'
        ))
        ->add('buy', null, array(
            'label' => 'Acheté ?'
        ))
        ->add('worth', null, array(
            'label' => 'Équivalent'
        ))
        ->add('category', EntityType::class, array(
            'class' => 'TravelBundle:Category',
            'choice_label' => 'name',
            'choice_value' => 'id'
            ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TravelBundle\Entity\Stuff'
            ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'travelbundle_stuff';
    }


}
