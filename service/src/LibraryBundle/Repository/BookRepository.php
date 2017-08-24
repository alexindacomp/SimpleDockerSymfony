<?php

namespace LibraryBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Class BookRepository
 * @package LibraryBundle\Repository
 */
class BookRepository extends EntityRepository
{
    /**
     * Get books by limit and offset
     *
     * @param null|int $limit
     * @param null|int $offset
     * @return array
     */
    public function getBooks($limit = null, $offset = null)
    {
        $qb = $this->createQueryBuilder('b')
            ->select('b')
            ->join('b.author', 'a')
            ->addSelect('a');

        if (false === is_null($offset))
            $qb->setFirstResult($offset);

        if (false === is_null($limit))
            $qb->setMaxResults($limit);

        return $qb->getQuery()
            ->getArrayResult();
    }

    /**
     * Get books by author using limit and offset
     *
     * @param null|int $limit
     * @param null|int $offset
     * @param null|int $id
     *
     * @return array
     */
    public function getBooksByAuthor($limit = null, $offset = null, $id = null)
    {
        $qb = $this->createQueryBuilder('b')
            ->select('b')
            ->join('b.author', 'a')
            ->addSelect('a');

        if (false === is_null($id))
            $qb->where('a.id = :id')
                ->setParameter('id', $id);

        if (false === is_null($offset))
            $qb->setFirstResult($offset);

        if (false === is_null($limit))
            $qb->setMaxResults($limit);

        return $qb->getQuery()
            ->getArrayResult();
    }
}
