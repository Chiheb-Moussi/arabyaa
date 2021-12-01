<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;
use DoctrineExtensions\Query\Mysql\Month;
use DoctrineExtensions\Query\Mysql\Year;


/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository implements PasswordUpgraderInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    /**
     * Used to upgrade (rehash) the user's password automatically over time.
     */
    public function upgradePassword(PasswordAuthenticatedUserInterface $user, string $newHashedPassword): void
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', \get_class($user)));
        }

        $user->setPassword($newHashedPassword);
        $this->_em->persist($user);
        $this->_em->flush();
    }

    // /**
    //  * @return User[] Returns an array of User objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?User
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function getAdminEmails()
    {
        return $this->createQueryBuilder('u')
            ->select('u.email')
            ->where('u.userType = :adminType')
            ->setParameter('adminType', User::USER_TYPE_SUPER_ADMIN)
            ->getQuery()
            ->getResult();
    }

    public function getCountUsers($status='',$month=0) 
    {
        $qb = $this->createQueryBuilder('u')
            ->select('COUNT(u.id)');
        if($status) {
            $qb->andWhere('u.status =:status')
                ->setParameter('status', $status);
        }
        if($month > 0)
        {
            $year = date('Y');
            $qb->andWhere('MONTH(u.createdAt) = :month ')
                ->setParameter('month', $month)
                ->andWhere('YEAR(u.createdAt) = :year ')
                ->setParameter('year', $year);
        }

        $count_users = $qb->getQuery()->getOneOrNullResult();
        return $count_users[1];
    }

    public function getUsers()
    {
        
        return $this->createQueryBuilder('u')
            
            ->andWhere('u.status = :status')
            ->setParameter('status', User::STATUS_APPROUVE)
            ->andWhere('u.userType <> :userType')
            ->setParameter('userType', User::USER_TYPE_SUPER_ADMIN)
            ->orderBy('u.createdAt', 'DESC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();
        
    }
}
