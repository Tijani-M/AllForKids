<?php
namespace ScolariteBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class AnneeScolaire
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
    private $libelle;

    /**
     * @ORM\OneToMany(targetEntity="ScolariteBundle\Entity\Matiere", mappedBy="anneeScolaire")
     */
    private $matiere;

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
    public function getMatiere()
    {
        return $this->matiere;
    }

    /**
     * @param mixed $matiere
     */
    public function setMatiere($matiere)
    {
        $this->matiere = $matiere;
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
        $this->matiere = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add matiere
     *
     * @param \ScolariteBundle\Entity\Matiere $matiere
     *
     * @return AnneeScolaire
     */
    public function addMatiere(\ScolariteBundle\Entity\Matiere $matiere)
    {
        $this->matiere[] = $matiere;

        return $this;
    }

    /**
     * Remove matiere
     *
     * @param \ScolariteBundle\Entity\Matiere $matiere
     */
    public function removeMatiere(\ScolariteBundle\Entity\Matiere $matiere)
    {
        $this->matiere->removeElement($matiere);
    }
}
