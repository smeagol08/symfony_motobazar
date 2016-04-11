<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Form\Type\AdvertisementType;
use AppBundle\Entity\Advertisement;
use AppBundle\Entity\Photo;
use AppBundle\Form\Type\FilterType;
use AppBundle\Entity\AdvCat;
use AppBundle\Form\Type\FilterStartType;


/**
 * Ads controller.
 *
 * @Route("/ads")
 */
class AdvertisementController extends Controller
{	
	
	/**
	 * @Route("/new", name="new_adv")
	 */
	public function newAction(Request $request)
	{
	$em = $this->getDoctrine()->getManager();
	
		$adv = new Advertisement();
		 
		$phot = new Photo();
		$phot->setAdvertisement($adv);
		$adv->getPhotos()->add($phot);
		 
		$adv->setTitle('');
		$adv->setDescription('');
		$adv->setUser($this->get('security.context')->getToken()->getUser());
		$adv->setCreated(new \DateTime('now'));
		 
		$form = $this->createForm(new AdvertisementType(), $adv);
		if ($request->isMethod('POST')) {
			$form->bind($request);
	
			if ($form->isValid()) {
				$em->persist($adv);
				$em->flush();
				return $this->redirectToRoute('new_adv');
			}
		}
    	 		
    	return $this->render('/advertisement/new.html.twig', array(
    			'form' => $form->createView(),
    	));
    }
	
    /**
     *@Route("/mine", name="mine_adv")
     **/
    public function mineAction(Request $request)
    {
    	 
    	$advRepo = $this->getDoctrine()->getRepository('AppBundle:Advertisement');
    	$adv = $advRepo->findBy(
    			array('user' => ($this->getUser()))
    			);
    	return $this->render('advertisement/mine.html.twig', array(
    			"adverts" => $adv,
    	));
    }
	
    /**
     * @Route("/show/{id}", name="show_adv")
     **/
    public function showAction($id)
    {
    	$em = $this->getDoctrine()->getManager();
    
    	$adv = $em->getRepository('AppBundle:Advertisement')->find($id);
    	if (!$adv) {
    		throw $this->createNotFoundException('Nie można znaleźć podanego ogłoszenia.');
    	}
    
    	return $this->render('advertisement/show.html.twig', array(
    			"advert" => $adv,
    	));
    }
    
    
    
    /**
     *@Route("/all", name="all_adv" )
     **/
    public function allAction(Request $request)
    {
    	$cat_id= $request->query->get('category');
    	$type_id= $request->query->get('type');
    	$loc= $request->query->get('location');
    	$p_from= $request->query->get('p_from');
    	$p_to= $request->query->get('p_to');
    	$cond_id= $request->query->get('condition');
    	
    	$em = $this->getDoctrine()->getManager();
    	$adv = $em->getRepository('AppBundle:Advertisement')->findAllbyFilter($cat_id, $type_id, $loc, $p_from, $p_to, $cond_id);
    	
    	$form = $this->createForm(new FilterType($em, $cat_id, $type_id, $loc, $p_from, $p_to, $cond_id));
    		
    	if ($request->isMethod('POST')) {
    		$form->bind($request);
    		if ($form->isValid()) {
	    		$cat= $type= $cond= null;
	    		if($form->get('category')->getData()!=null)
	    			$cat= $form->get('category')->getData()->getId();
	    		if($form->get('type')->getData()!=null)
	    			$type= $form->get('type')->getData()->getId();
	    		if($form->get('condition')->getData()!=null)
	    			$cond= $form->get('condition')->getData()->getId();
	    		$loc= $form->get('location')->getData();
	    		$p_from= $form->get('price_from')->getData();
	    		$p_to= $form->get('price_to')->getData();
				return $this->redirect($this->generateUrl('all_adv',  array('category' => $cat,
																		'type' => $type,
																		'location' => $loc,
																		'p_from' => $p_from,
																		'p_to' => $p_to,
																		'condition' => $cond
				)));
    		}
        }

    	return $this->render('advertisement/all.html.twig', array(
    			'form' => $form->createView(),
    			'adverts' =>  $adv,
    	));
    }

}