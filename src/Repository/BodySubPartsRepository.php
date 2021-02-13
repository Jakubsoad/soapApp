<?php

namespace App\Repository;

use App\Entity\BodySubParts;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BodySubParts|null find($id, $lockMode = null, $lockVersion = null)
 * @method BodySubParts|null findOneBy(array $criteria, array $orderBy = null)
 * @method BodySubParts[]    findAll()
 * @method BodySubParts[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BodySubPartsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BodySubParts::class);
    }

    // /**
    //  * @return BodySubParts[] Returns an array of BodySubParts objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BodySubParts
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
