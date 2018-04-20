<?php
namespace ScolariteBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class TypePara
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(nullable=false)
     */
    private $libelle;

    /**
     * @ORM\OneToMany(targetEntity="ScolariteBundle\Entity\Parascolaire", mappedBy="typePara")
     */
    private $parascolaire;

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
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @param mixed $libelle
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }

    /**
     * @return mixed
     */
    public function getParascolaire()
    {
        return $this->parascolaire;
    }

    /**
     * @param mixed $parascolaire
     */
    public function setParascolaire($parascolaire)
    {
        $this->parascolaire = $parascolaire;
    }

    public function __toString()
    {
        return $this->getLibelle();
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->parascolaire = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add parascolaire
     *
     * @param \ScolariteBundle\Entity\Parascolaire $parascolaire
     *
     * @return TypePara
     */
    public function addParascolaire(\ScolariteBundle\Entity\Parascolaire $parascolaire)
    {
        $this->parascolaire[] = $parascolaire;

        return $this;
    }

    /**
     * Remove parascolaire
     *
     * @param \ScolariteBundle\Entity\Parascolaire $parascolaire
     */
    public function removeParascolaire(\ScolariteBundle\Entity\Parascolaire $parascolaire)
    {
        $this->parascolaire->removeElement($parascolaire);
    }
}
