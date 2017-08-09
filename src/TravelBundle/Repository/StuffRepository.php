<?php

namespace TravelBundle\Repository;

/**
 * StuffRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class StuffRepository extends \Doctrine\ORM\EntityRepository
{
	public function findWhere($find)
	{
		$queryBuilder = $this->createQueryBuilder('stuff');
		$queryBuilder
		->where('stuff.priority <= '.$find)
		->orderBy('stuff.priority','ASC');

		return $queryBuilder->getQuery()->getResult();
	}
	public function countBuy($buy)
	{
		$qb = $this->createQueryBuilder('stuff');
		$qb->select('count(stuff.id)');
		$qb->where('stuff.buy = :buy');
		$qb->setParameter('buy', $buy);

		return $qb->getQuery()->getSingleScalarResult();
	}
}
