<?php
namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

class AdvertisementRepository extends EntityRepository
{
	
	public function findAllbyFilter($loc, $p_from, $p_to, $cond_id, $make_id, $model_id, $color_id){
		$query= $this->getEntityManager()->getRepository('AppBundle:Advertisement')
		->createQueryBuilder('adv_qb')
		->select('a')
		->from('AppBundle:Advertisement', 'a');
	
		if($loc){
			$query->andWhere('a.location = :loc')
			->setParameter('loc', $loc);
		}
		if($cond_id){
			$query->andWhere('a.carcondition = :cond_id')
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
		if($make_id){
			$query->andWhere('a.carmake = :make_id')
			->setParameter('make_id', $make_id);
		}
		if($model_id){
			$query->andWhere('a.carmodel = :model_id')
			->setParameter('model_id', $model_id);
		}
		if($color_id){
			$query->andWhere('a.color = :color_id')
			->setParameter('color_id', $color_id);
		}
    	try {
    		return $query->getQuery()->getResult();
    	} catch (\Doctrine\ORM\NoResultException $e) {
    		return null;
    	}
	}
	
	public function findNewest($how_many){
		$em = $query= $this->getEntityManager();
		$query = $em->createQuery(
			'SELECT a
    		FROM AppBundle:Advertisement a
    		ORDER BY a.created ASC'
		);
		
		try {
			return $query->setMaxResults($how_many)->getResult();
		} catch (\Doctrine\ORM\NoResultException $e) {
			return null;
		}
	}
}