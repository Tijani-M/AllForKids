<?php

namespace SanteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LocaliteRepository
 *
 * @ORM\Table(name="localite")
 * @ORM\Entity(repositoryClass="SanteBundle\Repository\LocaliteRepository")
 */
class Localite
{
    /**
     * @var int
     *
     * @ORM\Column(name="idLocalite", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idLocalite;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $libelleLocalite;

    /**
     * @ORM\Column(type="integer", length=8, nullable=true)
     */
    private $codePostal;

    /**
     * @ORM\ManyToOne(targetEntity="SanteBundle\Entity\Gouvernorat")
     * @ORM\JoinColumn(name="gouvernorat_id_gouvernorat", referencedColumnName="idGouvernorat")
     */
    private $gouvernorat;

    /**
     * @return int
     */
    public function getIdLocalite()
    {
        return $this->idLocalite;
    }

    /**
     * @param int $idLocalite
     */
    public function setIdLocalite($idLocalite)
    {
        $this->idLocalite = $idLocalite;
    }

    /**
     * @return mixed
     */
    public function getLibelleLocalite()
    {
        return $this->libelleLocalite;
    }

    /**
     * @param mixed $libelleLocalite
     */
    public function setLibelleLocalite($libelleLocalite)
    {
        $this->libelleLocalite = $libelleLocalite;
    }

    /**
     * @return mixed
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * @param mixed $codePostal
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;
    }

    /**
     * @return mixed
     */
    public function getGouvernorat()
    {
        return $this->gouvernorat;
    }

    /**
     * @param mixed $gouvernorat
     */
    public function setGouvernorat($gouvernorat)
    {
        $this->gouvernorat = $gouvernorat;
    }



    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->getLibelleLocalite();

    }


}

