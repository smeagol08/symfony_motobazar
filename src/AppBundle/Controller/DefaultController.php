<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\AdvCat;
use AppBundle\Entity\AdvType;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
    	
    	$em = $this->getDoctrine()->getManager();
    	$cats = $em->getRepository('AppBundle:AdvCat')->findAll();
    	$types = $em->getRepository('AppBundle:AdvType')->findAll();
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        	'cats' => $cats,
        	'types' => $types,
        ));
    }


}
