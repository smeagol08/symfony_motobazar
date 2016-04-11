<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class MessageType extends AbstractType
{

	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('content', 'textarea', array(
				'label' => false
		));

	}

	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
		$resolver->setDefaults(array(
				'data_class' => 'AppBundle\Entity\Message',
		));
	}

	public function getName()
	{
		return 'messagetype';
	}
}