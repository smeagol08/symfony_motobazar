<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class FilterType extends AbstractType
{
	public function __construct($em, $loc, $p_from, $p_to, $cond_id, $make_id, $model_id, $color_id) {
		$this->em = $em;
		$this->loc = $loc;
		$this->p_from = $p_from;
		$this->p_to = $p_to;
		$this->cond_id = $cond_id;
		$this->make_id = $make_id;
		$this->model_id = $model_id;
		$this->color_id = $color_id;
	}
	
	public function buildForm(FormBuilderInterface $builder, array $options)
	{	
		$cond= $cmake= $cmodel= $color= null;
		if($this->cond_id)
			$cond= $this->em->getReference("AppBundle:CarCondition", $this->cond_id);
		if($this->make_id)
			$cmake= $this->em->getReference("AppBundle:CarMake", $this->make_id);
		if($this->model_id)
			$cmodel= $this->em->getReference("AppBundle:CarModel", $this->model_id);
		if($this->color_id)
			$color= $this->em->getReference("AppBundle:Color", $this->color_id);
			
		$builder->add('price_from', MoneyType::class, array(
				'currency' => 'PLN',
				'required' => false,
				'data' => $this->p_from
		));
		$builder->add('price_to', MoneyType::class, array(
				'currency' => 'PLN',
				'required' => false,
				'data' => $this->p_to
		));
		$builder->add('location', TextType::class, array(
				'required' => false,
				'data' => $this->loc
		));
		$builder->add('carcondition', 'entity', array(
			'class' => 'AppBundle:CarCondition',
			'choice_label' => 'name',
			'property' => 'name',
			'empty_value' => 'Wszystkie',
			'required' => false,
			'data' => $cond,
		));

		$builder->add('carmake', 'entity', array(
			'class' => 'AppBundle:CarMake',
			'choice_label' => 'name',
			'choice_value' => 'id',
			'property' => 'id',
			'empty_value' => 'Wszystkie',
			'required' => false,
			'data' => $cmake,
				
		));

		$builder->add('carmodel', 'entity', array(
			'class' => 'AppBundle:CarModel',
			'choice_label' => 'name',
			'choice_value' => 'id',
			'property' => 'id',
			'placeholder' => 'Wszystkie',
			'required' => false,
			'data' => $cmodel,
		
		));
		
		$builder->add('color', 'entity', array(
			'class' => 'AppBundle:Color',
			'choice_label' => 'name',
			'choice_value' => 'id',
			'property' => 'id',
			'placeholder' => 'Wszystkie',
			'required' => false,
			'data' => $color,
		
		));
		
		$builder->add('save', SubmitType::class, array('label' => 'Filtruj'))
		->getForm();
	}
	
	public function getName()
	{
		return 'filtertype';
	}



}