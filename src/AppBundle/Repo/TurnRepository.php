<?php

namespace AppBundle\Repo;

use Doctrine\ORM\AbstractQuery;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Query\ResultSetMapping;

class TurnRepository extends EntityRepository
{
    public function countInFiles()
    {
        $qb = $this->createQueryBuilder('t')->select('count(t.id) total')->where('t.turnInName IS NOT NULL');

        return (int) $qb->getQuery()->getSingleScalarResult();
    }

    public function countOutFiles()
    {
        $qb = $this->createQueryBuilder('t')->select('count(t.id) total')->where('t.turnOutName IS NOT NULL');

        return (int) $qb->getQuery()->getSingleScalarResult();
    }
}
