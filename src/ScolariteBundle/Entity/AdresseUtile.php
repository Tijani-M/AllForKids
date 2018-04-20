<?php
namespace ScolariteBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class AdresseUtile
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=false)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=250, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=250, nullable=true)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $tel;

    /**
     * @ORM\Column(type="string", length=250, nullable=true)
     */
    private $siteWeb;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $gps;

    /**
     * @ORM\Column(type="boolean", nullable=false, options={"default":false})
     */
    private $valide;

    /**
     * @ORM\Column(type="date", nullable=false)
     */
    private $dateAjout;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateValidation;

    /**
     * @ORM\OneToMany(targetEntity="ScolariteBundle\Entity\ImageLieu", mappedBy="adresseUtile",cascade={"persist"})
     */
    private $imageLieu;

    /**
     * @ORM\ManyToOne(targetEntity="ScolariteBundle\Entity\CategorieLieu", inversedBy="adresseUtile")
     * @ORM\JoinColumn(name="categorie_id", referencedColumnName="id")
     */
    private $categorie;

    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User", inversedBy="adressesProposees")
     * @ORM\JoinColumn(name="membre_id", referencedColumnName="id")
     */
    private $membreProposant;

    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User", inversedBy="adressesValidees")
     * @ORM\JoinColumn(name="admin_id", referencedColumnName="id")
     */
    private $validateur;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param mixed $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @return mixed
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @param mixed $tel
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    /**
     * @return mixed
     */
    public function getSiteWeb()
    {
        return $this->siteWeb;
    }

    /**
     * @param mixed $siteWeb
     */
    public function setSiteWeb($siteWeb)
    {
        $this->siteWeb = $siteWeb;
    }

    /**
     * @return mixed
     */
    public function getGps()
    {
        return $this->gps;
    }

    /**
     * @param mixed $gps
     */
    public function setGps($gps)
    {
        $this->gps = $gps;
    }

    /**
     * @return mixed
     */
    public function getValide()
    {
        return $this->valide;
    }

    /**
     * @param mixed $valide
     */
    public function setValide($valide)
    {
        $this->valide = $valide;
    }

    /**
     * @return mixed
     */
    public function getDateAjout()
    {
        return $this->dateAjout;
    }

    /**
     * @param mixed $dateAjout
     */
    public function setDateAjout($dateAjout)
    {
        $this->dateAjout = $dateAjout;
    }

    /**
     * @return mixed
     */
    public function getDateValidation()
    {
        return $this->dateValidation;
    }

    /**
     * @param mixed $dateValidation
     */
    public function setDateValidation($dateValidation)
    {
        $this->dateValidation = $dateValidation;
    }

    /**
     * @return mixed
     */
    public function getImageLieu()
    {
        return $this->imageLieu;
    }

    /**
     * @param mixed $imageLieu
     */
    public function setImageLieu($imageLieu)
    {
        $this->imageLieu = $imageLieu;
    }

    /**
     * @return mixed
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param mixed $categorie
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }

    /**
     * @return mixed
     */
    public function getMembreProposant()
    {
        return $this->membreProposant;
    }

    /**
     * @param mixed $membreProposant
     */
    public function setMembreProposant($membreProposant)
    {
        $this->membreProposant = $membreProposant;
    }

    /**
     * @return mixed
     */
    public function getValidateur()
    {
        return $this->validateur;
    }

    /**
     * @param mixed $validateur
     */
    public function setValidateur($validateur)
    {
        $this->validateur = $validateur;
    }

    public function __toString()
    {
        return $this->getNom();
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->imageLieu = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add imageLieu
     *
     * @param \ScolariteBundle\Entity\ImageLieu $imageLieu
     *
     * @return AdresseUtile
     */
    public function addImageLieu(\ScolariteBundle\Entity\ImageLieu $imageLieu)
    {
        $imageLieu->setAdresseUtile($this);
        $this->imageLieu[] = $imageLieu;
        return $this;
    }

    /**
     * Remove imageLieu
     *
     * @param \ScolariteBundle\Entity\ImageLieu $imageLieu
     */
    public function removeImageLieu(\ScolariteBundle\Entity\ImageLieu $imageLieu)
    {
        $this->imageLieu->removeElement($imageLieu);
    }
}
