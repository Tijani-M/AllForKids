<?php

namespace SanteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CategorieProfessionnel
 *
 * @ORM\Table(name="categorie_professionnel")
 * @ORM\Entity(repositoryClass="SanteBundle\Repository\CategorieProfessionnelRepository")
 */
class CategorieProfessionnel
{
    /**
     * @var int
     *
     * @ORM\Column(name="idCateg", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idCateg;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $libelleCateg;


    /**
     * @return int
     */
    public function getIdCateg()
    {
        return $this->idCateg;
    }

    /**
     * @param int $idCateg
     */
    public function setIdCateg($idCateg)
    {
        $this->idCateg = $idCateg;
    }

    /**
     * @return mixed
     */
    public function getLibelleCateg()
    {
        return $this->libelleCateg;
    }

    /**
     * @param mixed $libelleCateg
     */
    public function setLibelleCateg($libelleCateg)
    {
        $this->libelleCateg = $libelleCateg;
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->getLibelleCateg();
    }


}

