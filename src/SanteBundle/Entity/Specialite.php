<?php

namespace SanteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Specialite
 *
 * @ORM\Table(name="specialite")
 * @ORM\Entity(repositoryClass="SanteBundle\Repository\SpecialiteRepository")
 */
class Specialite
{
    /**
     * @var int
     *
     * @ORM\Column(name="idSpecial", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idSpecial;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $libelleSpecial;

    /**
     * @ORM\Column(type="string", length=512, nullable=true)
     */
    private $descriptionSpecial;

    /**
     * @return int
     */
    public function getIdSpecial()
    {
        return $this->idSpecial;
    }

    /**
     * @param int $idSpecial
     */
    public function setIdSpecial($idSpecial)
    {
        $this->idSpecial = $idSpecial;
    }

    /**
     * @return mixed
     */
    public function getLibelleSpecial()
    {
        return $this->libelleSpecial;
    }

    /**
     * @param mixed $libelleSpecial
     */
    public function setLibelleSpecial($libelleSpecial)
    {
        $this->libelleSpecial = $libelleSpecial;
    }

    /**
     * @return mixed
     */
    public function getDescriptionSpecial()
    {
        return $this->descriptionSpecial;
    }

    /**
     * @param mixed $descriptionSpecial
     */
    public function setDescriptionSpecial($descriptionSpecial)
    {
        $this->descriptionSpecial = $descriptionSpecial;
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->getLibelleSpecial();
    }


}

