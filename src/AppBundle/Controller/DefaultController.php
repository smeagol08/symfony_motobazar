<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\AdvCat;
use AppBundle\Entity\AdvType;
use AppBundle\Entity\Advertisement;
use AppBundle\Entity\CarMake;
use AppBundle\Entity\CarModel;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
    	
    	$em = $this->getDoctrine()->getManager();
    	$ads = $em->getRepository('AppBundle:Advertisement')->findNewest(6);
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        	"adverts" => $ads,
        ));
    }
    
    /**
     * @Route("/ajax/makes/{makeId}", name="get_models_ajax", requirements={"makeId": "\d+"})
     */
    public function getModelsAction(Request $request, $makeId)
    {
    		$makeRepo = $this->getDoctrine()->getRepository('AppBundle:CarMake');
    		$cmake = $makeRepo->find($makeId);
    		 
    		$modelRepo = $this->getDoctrine()->getRepository('AppBundle:CarModel');
    		$models = $modelRepo->findByCarmake($cmake);
    		 
    		$modelsArray = array();
    		
    		$modelsArray[0]['name'] = "Wszystkie";
    		$modelsArray[0]['id'] = "";
    		$i = 1;
    		foreach ($models as $model)
    		{
    			$modelsArray[$i]['id'] = $model->getId();
    			$modelsArray[$i]['name'] = $model->getName();
    			$i++;
    		}   		 
    		return new JsonResponse(array('carmodels' => $modelsArray));

    }
    
    /**
     * @Route("/ajax/allmakes", name="get_allmakes_ajax")
     */
    public function getAllMakesAction(Request $request)
    {
    	$makeRepo = $this->getDoctrine()->getRepository('AppBundle:CarMake');
    	$cmakes = $makeRepo->findAll();

    	 
    	$makesArray = array();
    	$i = 0;
    	foreach ($cmakes as $cmake)
    	{
    		$makesArray[$i]['id'] = $cmake->getId();
    		$makesArray[$i]['name'] = $cmake->getName();
    		$i++;
    	}
    	return new JsonResponse(array('carmakes' => $makesArray));
    
    }

}
