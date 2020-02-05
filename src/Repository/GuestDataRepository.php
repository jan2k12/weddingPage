<?php

namespace App\Repository;

use App\Entity\GuestData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method GuestData|null find($id, $lockMode = null, $lockVersion = null)
 * @method GuestData|null findOneBy(array $criteria, array $orderBy = null)
 * @method GuestData[]    findAll()
 * @method GuestData[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GuestDataRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GuestData::class);
    }

    public function findOneByUserId($userId){
        return $this->createQueryBuilder('g')
            ->andWhere('g.user = :userId')
            ->setParameter('userId',$userId)
            ->getQuery()->getOneOrNullResult();
    }

    // /**
    //  * @return GuestData[] Returns an array of GuestData objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GuestData
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
