<?php

namespace App\Repository;

use App\Entity\LocVoiture;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LocVoiture|null find($id, $lockMode = null, $lockVersion = null)
 * @method LocVoiture|null findOneBy(array $criteria, array $orderBy = null)
 * @method LocVoiture[]    findAll()
 * @method LocVoiture[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LocVoitureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LocVoiture::class);
    }

    // /**
    //  * @return LocVoiture[] Returns an array of LocVoiture objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LocVoiture
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function CountId()
    {

        $conn = $this->getEntityManager()->getConnection();
        $sql = '
            SELECT id_voiture , COUNT(id_voiture) as res FROM `loc_voiture` GROUP BY(id_voiture)
            ';
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery();

        // returns an array of arrays (i.e. a raw data set)
        return $resultSet->fetchAllAssociative();

    }
}
