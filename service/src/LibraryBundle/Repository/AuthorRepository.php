<?php

namespace LibraryBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Class AuthorRepository
 * @package LibraryBundle\Repository
 */
class AuthorRepository extends EntityRepository
{
    /**
     * Get authors by limit and offset
     *
     * @param null $limit
     * @param null $offset
     * @return array
     */
    public function getAuthors($limit = null, $offset = null)
    {
        $qb = $this->createQueryBuilder('a')
            ->select('a.id, a.name');

        if (false === is_null($offset))
            $qb->setFirstResult($offset);

        if (false === is_null($limit))
            $qb->setMaxResults($limit);

        return $qb->getQuery()
            ->getArrayResult();
    }
}
