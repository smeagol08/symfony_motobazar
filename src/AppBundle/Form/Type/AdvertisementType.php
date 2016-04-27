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
    	$builder->add('title', 'text');
    	$builder->add('description', 'textarea');
    	$builder->add('price', 'money', array(
    			'currency' => 'PLN',
    	));
		$builder->add('carmake', 'entity', array(
				'class' => 'AppBundle:CarMake',
				'choice_label' => 'name',
		));
		$builder->add('carmodel', 'entity', array(
				'class' => 'AppBundle:CarModel',
				'choice_label' => 'name',
		));
		$builder->add('body', 'entity', array(
				'class' => 'AppBundle:Body',
				'choice_label' => 'name',
		));
		$builder->add('color', 'entity', array(
				'class' => 'AppBundle:Color',
				'choice_label' => 'name',
		));
		$builder->add('fuel', 'entity', array(
				'class' => 'AppBundle:Fuel',
				'choice_label' => 'name',
		));
		$builder->add('gearbox', 'entity', array(
				'class' => 'AppBundle:Gearbox',
				'choice_label' => 'name',
		));
		
		$builder->add('province', 'entity', array(
				'class' => 'AppBundle:Province',
				'choice_label' => 'name',
		));
		$builder->add('location', 'text');
		$builder->add('carcondition', 'entity', array(
				'class' => 'AppBundle:CarCondition',
				'choice_label' => 'name',
		));
		$builder->add('body', 'entity', array(
				'class' => 'AppBundle:Body',
				'choice_label' => 'name',
		));
		$builder->add('mileage', 'text');
		$builder->add('enginecapacity', 'text');
		$builder->add('yearofprod', 'text');
		$builder->add('horsepower', 'text');
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