<?php
/**
 * Created by PhpStorm.
 * User: Tijani
 * Date: 18/04/2018
 * Time: 22:23
 */

namespace ScolariteBundle\Repository;


use Doctrine\ORM\EntityRepository;

class ParascolaireRepository extends EntityRepository
{
    public function recherche($typePara, $matiere){

        $qb=$this->createQueryBuilder("p")
            ->select("p")
            ->where("p.typePara=:typePara")
            ->andWhere("p.matiere=:matiere")
            ->setParameter("typePara",$typePara)
            ->setParameter("matiere",$matiere);

        return $qb->getQuery()->getResult();
    }
}