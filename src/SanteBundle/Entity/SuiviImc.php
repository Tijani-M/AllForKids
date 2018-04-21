<?php

namespace SanteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SuiviImc
 *
 * @ORM\Table(name="suivi_imc")
 * @ORM\Entity(repositoryClass="SanteBundle\Repository\SuiviImcRepository")
 */
class SuiviImc
{
    /**
     * @var int
     *
     * @ORM\Column(name="idImc", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idImc;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateSuivi;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $Poids;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $Taille;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Age;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $valImc;

    /**
     * @return int
     */
    public function getIdImc()
    {
        return $this->idImc;
    }

    /**
     * @param int $idImc
     */
    public function setIdImc($idImc)
    {
        $this->idImc = $idImc;
    }

    /**
     * @return mixed
     */
    public function getDateSuivi()
    {
        return $this->dateSuivi;
    }

    /**
     * @param mixed $dateSuivi
     */
    public function setDateSuivi($dateSuivi)
    {
        $this->dateSuivi = $dateSuivi;
    }

    /**
     * @return mixed
     */
    public function getPoids()
    {
        return $this->Poids;
    }

    /**
     * @param mixed $Poids
     */
    public function setPoids($Poids)
    {
        $this->Poids = $Poids;
    }

    /**
     * @return mixed
     */
    public function getTaille()
    {
        return $this->Taille;
    }

    /**
     * @param mixed $Taille
     */
    public function setTaille($Taille)
    {
        $this->Taille = $Taille;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->Age;
    }

    /**
     * @param mixed $Age
     */
    public function setAge($Age)
    {
        $this->Age = $Age;
    }

    /**
     * @return mixed
     */
    public function getValImc()
    {
        return $this->valImc;
    }

    /**
     * @param mixed $valImc
     */
    public function setValImc($valImc)
    {
        $this->valImc = $valImc;
    }

}

