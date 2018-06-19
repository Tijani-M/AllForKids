<?php

namespace SanteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as baseUser;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * ProfessionnelSante
 *
 * @ORM\Table(name="professionnel_sante")
 * @ORM\Entity(repositoryClass="SanteBundle\Repository\ProfessionnelSanteRepository")
 * @UniqueEntity(fields="telephone", message="Ce numero de telephone existe déjà.")
 */
class ProfessionnelSante extends baseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(name="idPro", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $idPro;

    /**
     * @var string
     * @ORM\Column(name="telephone", type="string", length=10,nullable=false,unique=true)
     * @Assert\NotBlank(message="Cette valeur ne doit pas être vide.")
     */
    private $telephone;

    /**
     * @var string
     * @ORM\Column(name="adresse", type="string", length=100,nullable=false)
     * @Assert\NotBlank(message="Cette valeur ne doit pas être vide.")
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $gps;

    /**
     * @ORM\ManyToOne(targetEntity="SanteBundle\Entity\Localite")
     * @ORM\JoinColumn(name="localite_id_Localite", referencedColumnName="idLocalite",nullable=false)
     */
    private $localite;

    /**
     * @ORM\ManyToOne(targetEntity="SanteBundle\Entity\Gouvernorat")
     * @ORM\JoinColumn(name="gouvernorat_id_gouvernorat", referencedColumnName="idGouvernorat")
     */
    private $gouvernorat;

    /**
     * @var integer
     * @ORM\Column(name="tarif", type="integer", length=100,nullable=false)
     * @Assert\Type(type="integer", message="valeur {{ value }} invalide {{ type }}.")
     */
    private $tarif;

    /**
     * @ORM\ManyToOne(targetEntity="SanteBundle\Entity\Specialite")
     * @ORM\JoinColumn(name="Specialite_id_Special", referencedColumnName="idSpecial",nullable=false)
     */
    private $Specialite;

    /**
     * @ORM\ManyToOne(targetEntity="SanteBundle\Entity\Convention")
     * @ORM\JoinColumn(name="Convention_id_Conv", referencedColumnName="idConv",nullable=false)
     */
    private $Convention;

    /**
     * @ORM\ManyToOne(targetEntity="SanteBundle\Entity\CategorieProfessionnel")
     * @ORM\JoinColumn(name="CategorieProfessionnel_id_Categ", referencedColumnName="idCateg",nullable=false)
     */
    private $CategorieProfessionnel;


    public function getIdPro()
    {
        return $this->idPro;
    }

    public function setIdPro($idPro)
    {
        $this->idPro = $idPro;
    }


    public function getTelephone()
    {
        return $this->telephone;
    }

    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }

    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    public function getLocalite()
    {
        return $this->localite;
    }

    public function setLocalite($localite)
    {
        $this->localite = $localite;
    }

    public function getTarif()
    {
        return $this->tarif;
    }

    public function setTarif($tarif)
    {
        $this->tarif = $tarif;
    }

    public function getSpecialite()
    {
        return $this->Specialite;
    }

    public function setSpecialite($Specialite)
    {
        $this->Specialite = $Specialite;
    }

    public function getConvention()
    {
        return $this->Convention;
    }

    public function setConvention($Convention)
    {
        $this->Convention = $Convention;
    }

    public function getCategorieProfessionnel()
    {
        return $this->CategorieProfessionnel;
    }

    public function setCategorieProfessionnel($CategorieProfessionnel)
    {
        $this->CategorieProfessionnel = $CategorieProfessionnel;
    }

    public function getGps()
    {
        return $this->gps;
    }

    public function setGps($gps)
    {
        $this->gps = $gps;
    }

    public function getGouvernorat()
    {
        return $this->gouvernorat;
    }

    public function setGouvernorat($gouvernorat)
    {
        $this->gouvernorat = $gouvernorat;
    }

    public function __construct()
    {
        parent::__construct();
        $this->roles = array('ROLE_PRO');
        $this->expired = false;
        $this->locked = false;
        $this->credentialsExpired = false;
        $this->enabled = true;
    }

    public function __toString()
    {
        return $this->getUsername();
        //        return parent::__toString();
    }

}

