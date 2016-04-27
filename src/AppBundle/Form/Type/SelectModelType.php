<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;



class SelectModelType extends AbstractType
{

	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('carmake', 'entity', array(
			'class' => 'AppBundle:CarMake',
			'choice_label' => 'name',
			'choice_value' => 'id',
			'property' => 'id',
			'required' => true,
		));
		$builder->add('carmodel', 'entity', array(
			'class' => 'AppBundle:CarModel',
			'choice_label' => 'name',
			'choice_value' => 'id',
			'property' => 'id',
			'required' => true,
		));
		$builder->add('save', 'submit', array('label' => 'Usuń'))
		->getForm();
	}


	public function getName()
	{
		return 'selectmodeltype';
	}
}