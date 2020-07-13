<?php

namespace App\Repository;

use App\Entity\TypeEtudiant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TypeEtudiant|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeEtudiant|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeEtudiant[]    findAll()
 * @method TypeEtudiant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeEtudiantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeEtudiant::class);
    }

    // /**
    //  * @return TypeEtudiant[] Returns an array of TypeEtudiant objects
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
    public function findOneBySomeField($value): ?TypeEtudiant
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
