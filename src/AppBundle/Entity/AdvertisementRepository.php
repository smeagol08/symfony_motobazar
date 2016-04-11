<?php
namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

class AdvertisementRepository extends EntityRepository
{
	
	public function findAllbyFilter($cat_id, $type_id, $loc, $p_from, $p_to, $cond_id){
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
		if($cond_id){
			$query->andWhere('a.condition = :cond_id')
			->setParameter('cond_id', $cond_id);
		}
		if($p_from){
			$query->andWhere('a.price >= :p_from')
			->setParameter('p_from', $p_from);
		}
		if($p_to){
			$query->andWhere('a.price <= :p_to')
			->setParameter('p_to', $p_to);
		}
    	try {
    		return $query->getQuery()->getResult();
    	} catch (\Doctrine\ORM\NoResultException $e) {
    		return null;
    	}
	}
	
}