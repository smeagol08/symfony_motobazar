<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class HeaderType extends AbstractType
{
	
	
    public function buildForm(FormBuilderInterface $builder, array $options)
    {   	

		$builder->add('title', 'text');
		$builder->add('messages', 'collection', array(
				'options' => array('label' => false),
				'type' => new MessageType(),
				'allow_add' => true,
				'by_reference' => false,
				'allow_delete' => true,
		));		
		$builder->add('save', SubmitType::class, array('label' => 'Dodaj'))
            ->getForm();
	
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
    	$resolver->setDefaults(array(
    			'data_class' => 'AppBundle\Entity\Header',
    	));
    }

    public function getName()
    {
        return 'headertype';
    }
    
    
    
}