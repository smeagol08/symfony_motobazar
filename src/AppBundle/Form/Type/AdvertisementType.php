<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AdvertisementType extends AbstractType
{
	
	
    public function buildForm(FormBuilderInterface $builder, array $options)
    {   	

		$builder->add('type', 'entity', array(
    			'class' => 'AppBundle:AdvType',
    			'choice_label' => 'name',
    	));
		$builder->add('category', 'entity', array(
				'class' => 'AppBundle:AdvCat',
				'choice_label' => 'name',
		));
		$builder->add('title', 'text');
		$builder->add('description', 'textarea');
		$builder->add('price', 'money', array(
				'currency' => 'EUR',
		));
		$builder->add('location', 'text');
		$builder->add('photos', 'collection', array(
				'type' => new PhotoType(),
				'allow_add' => true,
				'by_reference' => false,
				'allow_delete' => true,
				'prototype' => true
		
		));
		$builder->add('save', SubmitType::class, array('label' => 'Dodaj'))
            ->getForm();
	
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
    	$resolver->setDefaults(array(
    			'data_class' => 'AppBundle\Entity\Advertisement',
    	));
    }

    public function getName()
    {
        return 'advertisementtype';
    }
    
    
    
}