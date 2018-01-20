<?php

namespace App\Repository;

use App\Entity\GameCharacter;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NoResultException;
use Symfony\Bridge\Doctrine\RegistryInterface;

class GameCharacterRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, GameCharacter::class);
    }

    public function getAll()
    {

        try {
            return $this->createQueryBuilder('gc')
                ->select('gc','r','a', 'cc')
                ->leftJoin('gc.race', 'r')
                ->leftJoin('gc.alignment', 'a')
                ->leftJoin('gc.className', 'cc')
                ->getQuery()
                ->getArrayResult();
        } catch (NoResultException $ex) {
            return null;
        }
    }

}
