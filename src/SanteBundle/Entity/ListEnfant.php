<?php

namespace SanteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ListEnfant
 *
 * @ORM\Table(name="list_enfant")
 * @ORM\Entity(repositoryClass="SanteBundle\Repository\ListEnfantRepository")
 */
class ListEnfant
{
    /**
     * @var int
     *
     * @ORM\Column(name="idEnfant", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idEnfant;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $prenomEnfant;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateNaissance;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $SexeEnfant;


    /**
     * @return int
     */
    public function getIdEnfant()
    {
        return $this->idEnfant;
    }

    /**
     * @param int $idEnfant
     */
    public function setIdEnfant($idEnfant)
    {
        $this->idEnfant = $idEnfant;
    }

    /**
     * @return mixed
     */
    public function getPrenomEnfant()
    {
        return $this->prenomEnfant;
    }

    /**
     * @param mixed $prenomEnfant
     */
    public function setPrenomEnfant($prenomEnfant)
    {
        $this->prenomEnfant = $prenomEnfant;
    }

    /**
     * @return mixed
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * @param mixed $dateNaissance
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;
    }

    /**
     * @return mixed
     */
    public function getSexeEnfant()
    {
        return $this->SexeEnfant;
    }

    /**
     * @param mixed $SexeEnfant
     */
    public function setSexeEnfant($SexeEnfant)
    {
        $this->SexeEnfant = $SexeEnfant;
    }


}

