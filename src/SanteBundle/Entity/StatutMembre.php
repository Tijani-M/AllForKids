<?php

namespace SanteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StatutMembre
 *
 * @ORM\Table(name="statut_membre")
 * @ORM\Entity(repositoryClass="SanteBundle\Repository\StatutMembreRepository")
 */
class StatutMembre
{
    /**
     * @var int
     *
     * @ORM\Column(name="idEtat", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idEtat;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $statut;


    /**
     * @return int
     */
    public function getIdEtat()
    {
        return $this->idEtat;
    }

    /**
     * @param int $idEtat
     */
    public function setIdEtat($idEtat)
    {
        $this->idEtat = $idEtat;
    }

    /**
     * @return mixed
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * @param mixed $statut
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->getStatut();
    }


}

