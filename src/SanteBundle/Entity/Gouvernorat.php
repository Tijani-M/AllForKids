<?php

namespace SanteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gouvernorat
 *
 * @ORM\Table(name="gouvernorat")
 * @ORM\Entity(repositoryClass="SanteBundle\Repository\GouvernoratRepository")
 */
class Gouvernorat
{
    /**
     * @var int
     *
     * @ORM\Column(name="idGouvernorat", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idGouvernorat;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $libelleGouvernorat;

    /**
     * @return int
     */
    public function getIdGouvernorat()
    {
        return $this->idGouvernorat;
    }

    /**
     * @param int $idGouvernorat
     */
    public function setIdGouvernorat($idGouvernorat)
    {
        $this->idGouvernorat = $idGouvernorat;
    }

    /**
     * @return mixed
     */
    public function getLibelleGouvernorat()
    {
        return $this->libelleGouvernorat;
    }

    /**
     * @param mixed $libelleGouvernorat
     */
    public function setLibelleGouvernorat($libelleGouvernorat)
    {
        $this->libelleGouvernorat = $libelleGouvernorat;
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->getLibelleGouvernorat();
    }


}

