<?php

namespace App\Repository;

use App\Entity\Nationality;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Nationality>
 *
 * @method Nationality|null find($id, $lockMode = null, $lockVersion = null)
 * @method Nationality|null findOneBy(array $criteria, array $orderBy = null)
 * @method Nationality[]    findAll()
 * @method Nationality[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NationaliteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Nationality::class);
    }

//    /**
//     * @return Nationality[] Returns an array of Nationality objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('n.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Nationality
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
