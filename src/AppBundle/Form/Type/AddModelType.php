<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class AddModelType extends AbstractType
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
		$builder->add('name', 'text', array(
			'required' => true,
		));

		$builder->add('save', 'submit', array('label' => 'Dodaj'))
		->getForm();

	}

	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
		$resolver->setDefaults(array(
				'data_class' => 'AppBundle\Entity\CarModel',
		));
	}

	public function getName()
	{
		return 'addmodeltype';
	}
}