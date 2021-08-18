<?php

namespace App\Repository;

use App\Entity\Post;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use DoctrineExtensions\Query\Mysql\Month;
use DoctrineExtensions\Query\Mysql\Year;


/**
 * @method Post|null find($id, $lockMode = null, $lockVersion = null)
 * @method Post|null findOneBy(array $criteria, array $orderBy = null)
 * @method Post[]    findAll()
 * @method Post[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Post::class);
    }

    public function getPosts($search='',$type='',$timeFillter='', $limit =0,$user='')
    {
        $qb = $this->createQueryBuilder('p')
            ->addSelect('u')
            ->innerJoin('p.user', 'u')
            ->where('p.title LIKE :search')
            ->setParameter('search', '%'.$search.'%')
            ->orderBy('p.createdAt', 'DESC');
        if($type) {
            $qb->andWhere('p.type = :type')
            ->setParameter('type', $type);
        }

        if($timeFillter =='lt_week') {
            $qb->andWhere('p.createdAt > :time')
            ->setParameter('time', new \DateTime('-7 days'));
        }
        if($timeFillter =='lt_month') {
            $qb->andWhere('p.createdAt > :time')
            ->setParameter('time', new \DateTime('-1 month'));
        }
        if($timeFillter =='lt_year') {
            $qb->andWhere('p.createdAt > :time')
            ->setParameter('time', new \DateTime('-1 year'));
        }
        if(is_object($user)) {
            $qb->andWhere('p.user = :user')
            ->setParameter('user', $user);
        }

        if($limit > 0 ) {
            $qb->setMaxResults($limit);
        }

        
        $posts = $qb->getQuery()->getResult();
        return $posts;
    }

    public function getCountPosts($month=0) 
    {
        $qb = $this->createQueryBuilder('p')
            ->select('COUNT(p.id)');
        if($month > 0)
        {
            $year = date('Y');
            $qb->andWhere('MONTH(p.createdAt) = :month ')
                ->setParameter('month', $month)
                ->andWhere('YEAR(p.createdAt) = :year ')
                ->setParameter('year', $year);
        }

        $count_posts = $qb->getQuery()->getOneOrNullResult();
        return $count_posts[1];
    }
}
