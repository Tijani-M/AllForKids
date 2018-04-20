<?php
namespace ScolariteBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class CategorieLieu
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity="ScolariteBundle\Entity\AdresseUtile", mappedBy="categorie")
     */
    private $adresseUtile;

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
    public function getAdresseUtile()
    {
        return $this->adresseUtile;
    }

    /**
     * @param mixed $adresseUtile
     */
    public function setAdresseUtile($adresseUtile)
    {
        $this->adresseUtile = $adresseUtile;
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
        $this->adresseUtile = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add adresseUtile
     *
     * @param \ScolariteBundle\Entity\AdresseUtile $adresseUtile
     *
     * @return CategorieLieu
     */
    public function addAdresseUtile(\ScolariteBundle\Entity\AdresseUtile $adresseUtile)
    {
        $this->adresseUtile[] = $adresseUtile;

        return $this;
    }

    /**
     * Remove adresseUtile
     *
     * @param \ScolariteBundle\Entity\AdresseUtile $adresseUtile
     */
    public function removeAdresseUtile(\ScolariteBundle\Entity\AdresseUtile $adresseUtile)
    {
        $this->adresseUtile->removeElement($adresseUtile);
    }
}
