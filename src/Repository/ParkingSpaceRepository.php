<?php

namespace App\Repository;

use App\Entity\ParkingSpace;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ParkingSpace|null find($id, $lockMode = null, $lockVersion = null)
 * @method ParkingSpace|null findOneBy(array $criteria, array $orderBy = null)
 * @method ParkingSpace[]    findAll()
 * @method ParkingSpace[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParkingSpaceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ParkingSpace::class);
    }

    // /**
    //  * @return ParkingSpace[] Returns an array of ParkingSpace objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ParkingSpace
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function findNbSpace()
    {
        return $this->createQueryBuilder('c')
            ->orderBy('c.parking_id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }
}
