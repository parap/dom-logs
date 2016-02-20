<?php

namespace AppBundle\Repo;

use Doctrine\ORM\AbstractQuery;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Query\ResultSetMapping;

class GameRepository extends EntityRepository
{
    public function countAllGoing()
    {
        $qb = $this->createQueryBuilder('g')->select('count(g.id) total')->where('g.winner IS NULL');

        return (int) $qb->getQuery()->getSingleScalarResult();
    }
}
