<?php

namespace App\Repository;

use App\Entity\Video;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use PhpParser\Node\Expr\Array_;

/**
 * @extends ServiceEntityRepository<Video>
 *
 * @method Video|null find($id, $lockMode = null, $lockVersion = null)
 * @method Video|null findOneBy(array $criteria, array $orderBy = null)
 * @method Video[]    findAll()
 * @method Video[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VideoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Video::class);
    }

    public function findTopThree(): array{
        return $this->createQueryBuilder('v')
            //recupere 3 videos
            ->setMaxResults(3)
            ->getQuery()
            ->getResult();
    }

    public function findByTitle($searchTerm){
        return $this->createQueryBuilder('v')
            ->andWhere('v.Title LIKE :searchTerm')
            ->setParameter('searchTerm','%'.$searchTerm.'%')
            ->getQuery()
            ->getResult();
    }
}
