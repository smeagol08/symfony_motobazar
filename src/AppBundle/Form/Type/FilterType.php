<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;


class FilterType extends AbstractType
{
	public function __construct($em, $cat_id, $type_id, $loc, $p_from, $p_to, $cond_id) {
		$this->em = $em;
		$this->cat_id = $cat_id;
		$this->type_id = $type_id;
		$this->loc = $loc;
		$this->p_from = $p_from;
		$this->p_to = $p_to;
		$this->cond_id = $cond_id;
	}
	
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$cat= $typ= $cond= null;
		if($this->cat_id)
			$cat= $this->em->getReference("AppBundle:AdvCat", $this->cat_id);
		if($this->type_id)
			$typ= $this->em->getReference("AppBundle:AdvType", $this->type_id);
		if($this->cond_id)
			$cond= $this->em->getReference("AppBundle:AdvCond", $this->cond_id);
		$builder->add('category', 'entity', array(
			'class' => 'AppBundle:AdvCat',
			'choice_label' => 'name',
			'property' => 'name',
			'empty_value' => 'Wszystkie',
			'required' => false,
			'data' => $cat
		));
		$builder->add('type', 'entity', array(
			'class' => 'AppBundle:AdvType',
			'choice_label' => 'name',
			'property' => 'name',
			'empty_value' => 'Wszystkie',
			'required' => false,
			'data' => $typ
		));
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
		$builder->add('condition', 'entity', array(
			'class' => 'AppBundle:AdvCond',
			'choice_label' => 'name',
			'property' => 'name',
			'empty_value' => 'Wszystkie',
			'required' => false,
			'data' => $cond
		));
		$builder->add('save', SubmitType::class, array('label' => 'Filtruj'))
		->getForm();
	}
	
	public function getName()
	{
		return 'filtertype';
	}



}