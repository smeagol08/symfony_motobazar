<?php
namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

class AdvertisementRepository extends EntityRepository
{
	
	public function findAllbyFilter($cat_id, $type_id, $loc){
		$query= $this->getEntityManager()->getRepository('AppBundle:Advertisement')
		->createQueryBuilder('adv_qb')
		->select('a')
		->from('AppBundle:Advertisement', 'a');
		if($cat_id){
    		$query->andWhere('a.category = :cat_id')
       		->setParameter('cat_id', $cat_id);
		}
		if($type_id){
			$query->andWhere('a.type = :type_id')
			->setParameter('type_id', $type_id);
		}
		if($loc){
			$query->andWhere('a.location = :loc')
			->setParameter('loc', $loc);
		}
    	try {
    		return $query->getQuery()->getResult();
    	} catch (\Doctrine\ORM\NoResultException $e) {
    		return null;
    	}
	}
	
}