<?php
namespace ScolariteBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="ScolariteBundle\Repository\ParascolaireRepository")
 * @Vich\Uploadable
 */
class Parascolaire
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=250, nullable=true)
     */
    private $description;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="parascolaire_image", fileNameProperty="fileName")
     *
     * @var File
     */
    private $fileFile;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $fileName;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $updatedAt;


    /**
     * @ORM\Column(type="boolean", nullable=true, options={"default":false})
     */
    private $valide;

    /**
     * @ORM\Column(type="date", nullable=false)
     */
    private $dateAjout;

    /**
     * @ORM\Column(type="date", nullable=false)
     */
    private $dateValidation;

    /**
     * @ORM\OneToMany(targetEntity="ScolariteBundle\Entity\LienPara", mappedBy="parascolaire")
     */
    private $lienExterne;

    /**
     * @ORM\ManyToOne(targetEntity="ScolariteBundle\Entity\Matiere", inversedBy="parascolaire")
     * @ORM\JoinColumn(name="matiere_id", referencedColumnName="id")
     */
    private $matiere;

    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User", inversedBy="parascolairesProposes")
     * @ORM\JoinColumn(name="membre_id", referencedColumnName="id")
     */
    private $membreProposant;

    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User", inversedBy="parascolairesValides")
     * @ORM\JoinColumn(name="admin_id", referencedColumnName="id")
     */
    private $validateur;

    /**
     * @ORM\ManyToOne(targetEntity="ScolariteBundle\Entity\TypePara", inversedBy="parascolaire")
     * @ORM\JoinColumn(name="type_para_id", referencedColumnName="id")
     */
    private $typePara;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->lienExterne = new \Doctrine\Common\Collections\ArrayCollection();
        $this->setDateAjout(new \DateTime());
        $this->setValide(false);
    }

    public function __toString()
    {
        return $this->getTitre();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Parascolaire
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Parascolaire
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set fileName
     *
     * @param string $fileName
     *
     * @return Parascolaire
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;

        return $this;
    }

    /**
     * Get fileName
     *
     * @return string
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Parascolaire
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set valide
     *
     * @param boolean $valide
     *
     * @return Parascolaire
     */
    public function setValide($valide)
    {
        $this->valide = $valide;

        return $this;
    }

    /**
     * Get valide
     *
     * @return boolean
     */
    public function getValide()
    {
        return $this->valide;
    }

    /**
     * Set dateAjout
     *
     * @param \DateTime $dateAjout
     *
     * @return Parascolaire
     */
    public function setDateAjout($dateAjout)
    {
        $this->dateAjout = $dateAjout;

        return $this;
    }

    /**
     * Get dateAjout
     *
     * @return \DateTime
     */
    public function getDateAjout()
    {
        return $this->dateAjout;
    }

    /**
     * Set dateValidation
     *
     * @param \DateTime $dateValidation
     *
     * @return Parascolaire
     */
    public function setDateValidation($dateValidation)
    {
        $this->dateValidation = $dateValidation;

        return $this;
    }

    /**
     * Get dateValidation
     *
     * @return \DateTime
     */
    public function getDateValidation()
    {
        return $this->dateValidation;
    }

    /**
     * Add lienExterne
     *
     * @param \ScolariteBundle\Entity\LienPara $lienExterne
     *
     * @return Parascolaire
     */
    public function addLienExterne(\ScolariteBundle\Entity\LienPara $lienExterne)
    {
        $this->lienExterne[] = $lienExterne;

        return $this;
    }

    /**
     * Remove lienExterne
     *
     * @param \ScolariteBundle\Entity\LienPara $lienExterne
     */
    public function removeLienExterne(\ScolariteBundle\Entity\LienPara $lienExterne)
    {
        $this->lienExterne->removeElement($lienExterne);
    }

    /**
     * Get lienExterne
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLienExterne()
    {
        return $this->lienExterne;
    }

    /**
     * Set matiere
     *
     * @param \ScolariteBundle\Entity\Matiere $matiere
     *
     * @return Parascolaire
     */
    public function setMatiere(\ScolariteBundle\Entity\Matiere $matiere = null)
    {
        $this->matiere = $matiere;

        return $this;
    }

    /**
     * Get matiere
     *
     * @return \ScolariteBundle\Entity\Matiere
     */
    public function getMatiere()
    {
        return $this->matiere;
    }

    /**
     * Set membreProposant
     *
     * @param \UserBundle\Entity\User $membreProposant
     *
     * @return Parascolaire
     */
    public function setMembreProposant(\UserBundle\Entity\User $membreProposant = null)
    {
        $this->membreProposant = $membreProposant;

        return $this;
    }

    /**
     * Get membreProposant
     *
     * @return \UserBundle\Entity\User
     */
    public function getMembreProposant()
    {
        return $this->membreProposant;
    }

    /**
     * Set validateur
     *
     * @param \UserBundle\Entity\User $validateur
     *
     * @return Parascolaire
     */
    public function setValidateur(\UserBundle\Entity\User $validateur = null)
    {
        $this->validateur = $validateur;

        return $this;
    }

    /**
     * Get validateur
     *
     * @return \UserBundle\Entity\User
     */
    public function getValidateur()
    {
        return $this->validateur;
    }

    /**
     * Set typePara
     *
     * @param \ScolariteBundle\Entity\TypePara $typePara
     *
     * @return Parascolaire
     */
    public function setTypePara(\ScolariteBundle\Entity\TypePara $typePara = null)
    {
        $this->typePara = $typePara;

        return $this;
    }

    /**
     * Get typePara
     *
     * @return \ScolariteBundle\Entity\TypePara
     */
    public function getTypePara()
    {
        return $this->typePara;
    }
    public function setfileFile(File $file = null)
    {
        $this->fileFile = $file;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($file) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getfileFile()
    {
        return $this->fileFile;
    }
}
