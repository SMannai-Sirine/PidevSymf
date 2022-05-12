<?php

namespace App\Repository;

use App\Entity\Reservationtaxi;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Reservationtaxi|null find($id, $lockMode = null, $lockVersion = null)
 * @method Reservationtaxi|null findOneBy(array $criteria, array $orderBy = null)
 * @method Reservationtaxi[]    findAll()
 * @method Reservationtaxi[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReservationtaxiRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Reservationtaxi::class);
    }

    // /**
    //  * @return Reservationtaxi[] Returns an array of Reservationtaxi objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Reservationtaxi
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
