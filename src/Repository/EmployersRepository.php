<?php

namespace App\Repository;

use App\Entity\Employers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Employers|null find($id, $lockMode = null, $lockVersion = null)
 * @method Employers|null findOneBy(array $criteria, array $orderBy = null)
 * @method Employers[]    findAll()
 * @method Employers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmployersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Employers::class);
    }

    // /**
    //  * @return Employers[] Returns an array of Employers objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Employers
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
