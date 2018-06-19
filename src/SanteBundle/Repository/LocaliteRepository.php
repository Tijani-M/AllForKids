<?php
/**
 * Created by PhpStorm.
 * User: G534616
 * Date: 11/04/2018
 * Time: 16:30
 */

namespace SanteBundle\Repository;


use Doctrine\ORM\EntityRepository;

class LocaliteRepository extends EntityRepository
{
    public function findByGouv($idGouvernorat){

        $qb=$this->createQueryBuilder("p")
            ->select("p")
            ->where("p.gouvernorat=:gouv")
            ->setParameter("gouv",$idGouvernorat);

        return $qb->getQuery()->getResult();
    }
}