<?php

namespace SanteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CalendrierVaccinal
 *
 * @ORM\Table(name="calendrier_vaccinal")
 * @ORM\Entity(repositoryClass="SanteBundle\Repository\CalendrierVaccinalRepository")
 */
class CalendrierVaccinal
{
    /**
     * @var int
     *
     * @ORM\Column(name="idVaccin", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idVaccin;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $NomVaccin;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $AgeVaccin;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $Observation;



    /**
     * @return int
     */
    public function getIdVaccin()
    {
        return $this->idVaccin;
    }

    /**
     * @param int $idVaccin
     */
    public function setIdVaccin($idVaccin)
    {
        $this->idVaccin = $idVaccin;
    }

    /**
     * @return mixed
     */
    public function getNomVaccin()
    {
        return $this->NomVaccin;
    }

    /**
     * @param mixed $NomVaccin
     */
    public function setNomVaccin($NomVaccin)
    {
        $this->NomVaccin = $NomVaccin;
    }

    /**
     * @return mixed
     */
    public function getAgeVaccin()
    {
        return $this->AgeVaccin;
    }

    /**
     * @param mixed $AgeVaccin
     */
    public function setAgeVaccin($AgeVaccin)
    {
        $this->AgeVaccin = $AgeVaccin;
    }

    /**
     * @return mixed
     */
    public function getObservation()
    {
        return $this->Observation;
    }

    /**
     * @param mixed $Observation
     */
    public function setObservation($Observation)
    {
        $this->Observation = $Observation;
    }

    /**
     * @return mixed
     */
    public function getVaccinEnfant()
    {
        return $this->vaccinEnfant;
    }

    /**
     * @param mixed $vaccinEnfant
     */
    public function setVaccinEnfant($vaccinEnfant)
    {
        $this->vaccinEnfant = $vaccinEnfant;
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->getNomVaccin();
    }

}

