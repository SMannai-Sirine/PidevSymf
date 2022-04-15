<?php

namespace App\Repository;

use App\Entity\TaxiAero;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TaxiAero|null find($id, $lockMode = null, $lockVersion = null)
 * @method TaxiAero|null findOneBy(array $criteria, array $orderBy = null)
 * @method TaxiAero[]    findAll()
 * @method TaxiAero[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TaxiAeroRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TaxiAero::class);
    }

    // /**
    //  * @return TaxiAero[] Returns an array of TaxiAero objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TaxiAero
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
