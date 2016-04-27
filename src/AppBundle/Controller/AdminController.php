<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Color;
use AppBundle\Entity\CarMake;
use AppBundle\Entity\CarModel;
use AppBundle\Form\Type\AddModelType;
use AppBundle\Form\Type\SelectModelType;



/**
 * Ads controller.
 *
 * @Route("/admin")
 */

class AdminController extends Controller
{	
	/**
	 * @Route("/dbo", name="dbo")
	 */
	public function dboAction(Request $request){
		 
		return $this->render('admin/dbo.html.twig');
	}
	
	
	
	/**
	 * @Route("/color/new", name="new_color")
	 */
	public function newColorAction(Request $request){
		
		$em = $this->getDoctrine()->getManager();
		$color = new Color();
		$form = $this->createFormBuilder($color)
            ->add('name', 'text')
            ->add('save', 'submit', array('label' => 'Dodaj'))
            ->getForm();
		
            if ($request->isMethod('POST')) {
            	$form->bind($request);
            
            	if ($form->isValid()) {
            		$em->persist($color);
            		$em->flush();
            		return $this->redirectToRoute('new_color');
            	}
            }
                     
		return $this->render('admin/color/new.html.twig', array(
            'form' => $form->createView(),
        ));
	}
	
	/**
	 * @Route("/carmake/new", name="new_carmake")
	 */
	public function newCarmakeAction(Request $request){
	
		$em = $this->getDoctrine()->getManager();
		$cmake = new CarMake();
		$form = $this->createFormBuilder($cmake)
		->add('name', 'text')
		->add('save', 'submit', array('label' => 'Dodaj'))
		->getForm();
	
		if ($request->isMethod('POST')) {
			$form->bind($request);
	
			if ($form->isValid()) {
				$em->persist($cmake);
				$em->flush();
				return $this->redirectToRoute('new_carmake');
			}
		}
		 
		return $this->render('admin/carmake/new.html.twig', array(
				'form' => $form->createView(),
		));
	}
	
	/**
	 * @Route("/carmodel/new", name="new_carmodel")
	 */
	public function newCarmodelAction(Request $request){
	
		$em = $this->getDoctrine()->getManager();
		$cmodel = new CarModel();
		$form = $this->createForm(new AddModelType(),$cmodel);
	
		if ($request->isMethod('POST')) {
			  $form->handleRequest($request);
	
			if ($form->isValid()) {
				$em->persist($cmodel);
				$em->flush();
				return $this->redirectToRoute('new_carmodel');
			}
		}
			
		return $this->render('admin/carmodel/new.html.twig', array(
				'form' => $form->createView(),
		));
	}
	
	/**
	 * @Route("/color/delete", name="delete_color")
	 */
	public function deleteColorAction(Request $request)
	{
		$em = $this->getDoctrine()->getManager();
		$form = $this->createFormBuilder()
		->add('name', 'entity', array(
			'class' => 'AppBundle:Color',
			'choice_label' => 'name',
			'required' => true,
			'property' => 'id',
		))
		->add('save', 'submit', array('label' => 'Usuń'))
		->getForm();
		
		if ($request->isMethod('POST')) {
			$form->bind($request);	
			if ($form->isValid()) {
				$col_id= $form->get('name')->getData()->getId();
				$color= $em->getRepository('AppBundle:Color')->find($col_id);
				$em->remove($color);
				$em->flush();
				return $this->redirectToRoute('delete_color');
			}
		}
		 
		return $this->render('admin/color/delete.html.twig', array(
				'form' => $form->createView(),
		));
	}
	
	
	/**
	 * @Route("/carmake/delete", name="delete_carmake")
	 */
	public function deleteCarMakeAction(Request $request)
	{
		$em = $this->getDoctrine()->getManager();
		$form = $this->createFormBuilder()
		->add('name', 'entity', array(
				'class' => 'AppBundle:CarMake',
				'choice_label' => 'name',
				'required' => true,
				'property' => 'id',
		))
		->add('save', 'submit', array('label' => 'Usuń'))
		->getForm();
	
		if ($request->isMethod('POST')) {
			$form->bind($request);
			if ($form->isValid()) {
				$make_id= $form->get('name')->getData()->getId();
				$cmake= $em->getRepository('AppBundle:CarMake')->find($make_id);
				$em->remove($cmake);
				$em->flush();
				return $this->redirectToRoute('delete_carmake');
			}
		}
			
		return $this->render('admin/carmake/delete.html.twig', array(
				'form' => $form->createView(),
		));
	}
	
	
	/**
	 * @Route("/carmodel/delete", name="delete_carmodel")
	 */
	public function deleteCarModelAction(Request $request)
	{
	$em = $this->getDoctrine()->getManager();

		$form = $this->createForm(new SelectModelType());
	
		if ($request->isMethod('POST')) {
			  $form->handleRequest($request);
	
			if ($form->isValid()) {
				$model_id= $form->get('carmodel')->getData()->getId();
				$cmodel= $em->getRepository('AppBundle:CarModel')->find($model_id);
				
				$em->remove($cmodel);
				$em->flush();
				return $this->redirectToRoute('delete_carmodel');
			}
		}
		
			
		return $this->render('admin/carmodel/delete.html.twig', array(
				'form' => $form->createView(),
		));
	}
	
}