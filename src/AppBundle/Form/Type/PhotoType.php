<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PhotoType extends AbstractType
{

	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('file', 'file');
	}

	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
		$resolver->setDefaults(array(
				'data_class' => 'AppBundle\Entity\Photo',
		));
	}	

	public function getName()
	{
		return 'phototype';
	}
}