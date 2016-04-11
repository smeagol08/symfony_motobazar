<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Header;
use AppBundle\Entity\Message;
use AppBundle\Entity\Advertisement;
use AppBundle\Form\Type\HeaderType;
use AppBundle\Form\Type\MessageType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class MessageController extends Controller
{	
	/**
	 * @Route("message/new/{id}", name="new_msg")
	 **/
    public function newAction(Request $request, $id){
    	$em = $this->getDoctrine()->getManager();
    	
    	$adv = $em->getRepository('AppBundle:Advertisement')->find($id);
		$user= $adv->getUser();
		
    	$head = new Header();	
    	$msg = new Message();
    	
    	$msg->setHeader($head);
    	$msg->setCreated(new \DateTime('now'));
    	$msg->setIsFromSender('1');
    	$msg->setIsRead('0');
    	$head->setUserFrom($this->get('security.context')->getToken()->getUser());
    	$head->setUserTo($user);
    	$head->getMessages()->add($msg);
    	
    	$head->setTitle('');
    	$head->setCreated(new \DateTime('now'));
    
    	$head->setAdvertisement($adv);
    	
    	$form = $this->createForm(new HeaderType(), $head);
    	if ($request->isMethod('POST')) {
    		$form->bind($request);
	
    		if ($form->isValid()) {
    			$em->persist($head);
    			$em->flush();
    	
    		}
    	}
    	return $this->render('message/new.html.twig', array(
    			'form' => $form->createView(),
    	));
    }
    
    /**
     * @Route("message/recived", name="recived_msg")
     **/
    public function recivedAction(Request $request){
    	$em = $this->getDoctrine()->getManager();
    	$user= $this->get('security.context')->getToken()->getUser();
    	$query = $em->createQuery(
    		'SELECT h
    		FROM AppBundle:Header h
    		WHERE h.userto = :user
    		ORDER BY h.created ASC'
    	)->setParameter('user', $user);
    			 
    	$heads = $query->getResult();
    			 
    	return $this->render('message/recived.html.twig', array(
    		'heads' => $heads,
    	));
    }
    
    /**
     * @Route("message/sent", name="sent_msg")
     **/
    public function sentAction(Request $request){
    	$em = $this->getDoctrine()->getManager();
    	$user= $this->get('security.context')->getToken()->getUser();
    	$query = $em->createQuery(
    		'SELECT h
    		FROM AppBundle:Header h
    		WHERE h.userfrom = :user
    		ORDER BY h.created ASC'
    			)->setParameter('user', $user);
    
    			$heads = $query->getResult();
    
    			return $this->render('message/sent.html.twig', array(
    					'heads' => $heads,
    			));
    }
    
    /**
     * @Route("message/show/{id}", name="show_msg")
     **/
    public function showAction(Request $request, $id){
    	$em = $this->getDoctrine()->getManager();
    	$head= $em->getRepository('AppBundle:Header')->find($id);
    	$user= $this->get('security.context')->getToken()->getUser();
    	
    	$msg = new Message();
    	$msg->setHeader($head);
    	$msg->setCreated(new \DateTime('now'));
    	if($head->getUserFrom()==$user){
    		$msg->setIsFromSender('1');
    	}else{
    		$msg->setIsFromSender('0');
    	}
    	$msg->setIsRead('0');
    	
    	$form = $this->createForm(new MessageType(), $msg);
    	$form->add('save', SubmitType::class, array('label' => 'Odpowiedz'));
    	if ($request->isMethod('POST')) {
    		$form->bind($request);
    	
    		if ($form->isValid()) {
    			$em->persist($msg);
    			$em->flush();
    			 
    		}
    	}
    	
    	return $this->render('message/show.html.twig', array(
    		'head' => $head,
    		'form' => $form->createView(),
    	));
    }
}