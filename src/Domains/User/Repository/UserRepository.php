<?php

namespace App\Domains\User\Repository;

use App\Domains\User\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class UserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function getOrderedUsers(?string $filter = null): array
    {
        $qb = $this->createQueryBuilder('u');

        if ($filter) {
            $qb->andWhere('u.email LIKE :filter OR u.username LIKE :filter')
                ->setParameter('filter', '%' . $filter . '%');
        }

        return $qb->getQuery()->getResult();
    }
}
