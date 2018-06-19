<?php

namespace SanteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * RDVSante
 *
 * @ORM\Table(name="rdv_sante")
 * @ORM\Entity(repositoryClass="SanteBundle\Repository\RDVSanteRepository")
 */
class RDVSante
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="idRdv", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $idRdv;

    /**
     * @var integer
     *
     * @ORM\Column(name="duree", type="integer", length=3,nullable=false)
     * @Assert\NotBlank(message="Cette valeur ne doit pas être vide.")
     */
    private $duree;

    /**
     * @var \DateTime
     * @ORM\Column(name="date_RDV",   type="datetime", nullable =false)
     */
    private $dateRDV;

    /**
     * @ORM\ManyToOne(targetEntity="SanteBundle\Entity\ProfessionnelSante")
     * @ORM\JoinColumn(name="ProfessionnelSante_RDVSante",referencedColumnName="idPro",nullable=false)
     */
    private $professionnel;

    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
     * @ORM\JoinColumn(name="User_RDVSante",referencedColumnName="id",nullable=false)
     */
    private $patient;

    /**
     * @var boolean
     * @ORM\Column(name="is_validated", type="boolean",nullable=false)
     */
    private $isValidated;


    public function getIdRdv()
    {
        return $this->idRdv;
    }

    public function setIdRdv($idRdv)
    {
        $this->idRdv = $idRdv;
    }

    public function getDuree()
    {
        return $this->duree;
    }

    public function setDuree($duree)
    {
        $this->duree = $duree;
    }

    public function getDateRDV()
    {
        return $this->dateRDV;
    }

    public function setDateRDV($dateRDV)
    {
        $this->dateRDV = $dateRDV;
    }

    public function getPatient()
    {
        return $this->patient;
    }

    public function setPatient($patient)
    {
        $this->patient = $patient;
    }

    public function getProfessionnel()
    {
        return $this->professionnel;
    }

    public function setProfessionnel($professionnel)
    {
        $this->professionnel = $professionnel;
    }

    public function getIsValidated()
    {
        return $this->isValidated;
    }

    public function setIsValidated($isValidated)
    {
        $this->isValidated = $isValidated;
    }

    public function __construct()
    {
        $this->isValidated = false;
    }

}

