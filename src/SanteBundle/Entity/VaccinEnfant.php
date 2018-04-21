<?php

namespace SanteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VaccinEnfant
 *
 * @ORM\Table(name="vaccin_enfant")
 * @ORM\Entity(repositoryClass="SanteBundle\Repository\VaccinEnfantRepository")
 */
class VaccinEnfant
{
    /**
     * @var int
     *
     * @ORM\Column(name="idCalVac", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idCalVac;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateVaccin;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $StatutVaccin;


    /**
     * @return int
     */
    public function getIdCalVac()
    {
        return $this->idCalVac;
    }

    /**
     * @param int $idCalVac
     */
    public function setIdCalVac($idCalVac)
    {
        $this->idCalVac = $idCalVac;
    }

    /**
     * @return mixed
     */
    public function getDateVaccin()
    {
        return $this->dateVaccin;
    }

    /**
     * @param mixed $dateVaccin
     */
    public function setDateVaccin($dateVaccin)
    {
        $this->dateVaccin = $dateVaccin;
    }

    /**
     * @return mixed
     */
    public function getStatutVaccin()
    {
        return $this->StatutVaccin;
    }

    /**
     * @param mixed $StatutVaccin
     */
    public function setStatutVaccin($StatutVaccin)
    {
        $this->StatutVaccin = $StatutVaccin;
    }


}

