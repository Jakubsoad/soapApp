<?php

namespace App\Repository;

use App\Entity\BodyPart;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BodyPart|null find($id, $lockMode = null, $lockVersion = null)
 * @method BodyPart|null findOneBy(array $criteria, array $orderBy = null)
 * @method BodyPart[]    findAll()
 * @method BodyPart[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BodyPartRepository extends ServiceEntityRepository
{
    /**
     * BodyPartRepository constructor.
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BodyPart::class);
    }

    /**
     * @param string $name
     *
     * @return BodyPart
     */
    public function findOneByLowerName(string $name): BodyPart
    {
        $qb = $this->createQueryBuilder('bp')
            ->andWhere('lower(bp.name) = :name')
            ->setParameter('name', trim(strtolower($name)))
            ->setMaxResults(1);

        return $qb->getQuery()->getSingleResult();
    }
}
