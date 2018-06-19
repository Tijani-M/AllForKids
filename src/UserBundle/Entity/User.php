<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as baseUser;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 *
 *
 * @ORM\Table(name="user")
 * @UniqueEntity(fields="telephone", message="Ce numero de telephone existe déjà.")
 * @ORM\Entity(repositoryClass="UserBundle\Repository\UserRepository")
 * @Vich\Uploadable
 */
class User extends baseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(name="telephone", type="string", length=255, nullable =true, unique=true)
     */
    private $telephone;

    /**
     * @var boolean
     * @ORM\Column(name="genre",  nullable=true)
     */
    private $genre;

    /**
     * @var string
     * @ORM\Column(name="date_naissance",   type="date", nullable =true)
     */
    private $datenaissance;

    /**
     * @var integer
     * @ORM\Column(name="nbEnfant", type="integer", length=10, nullable=true)
     * @Assert\Type(
     *     type="integer",
     *     message="valeur {{ value }} invalide {{ type }}."
     * )
     */
    protected $nbEnfant;

    /**
     * @var string
     * @ORM\Column(name="profession", type="string", length=255, nullable =true)
     */
    private $profession;

    /**
     * @ORM\Column(type="string", length=255, nullable =true)
     * @var string
     */
    private $imageUser;

    /**
     * @Vich\UploadableField(mapping="users_images", fileNameProperty="imageUser", nullable =true)
     * @var File
     */
    private $imageFileUser;

    /**
     * @ORM\Column(type="datetime", nullable =true)
     * @var \DateTime
     */
    private $updatedAt;

    public function getTelephone()
    {
        return $this->telephone;
    }

    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    public function isGenre()
    {
        return $this->genre;
    }

    public function setGenre($genre)
    {
        $this->genre = $genre;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNbEnfant()
    {
        return $this->nbEnfant;
    }

    public function setNbEnfant($nbEnfant)
    {
        $this->nbEnfant = $nbEnfant;
    }


    public function getProfession()
    {
        return $this->profession;
    }

    public function setProfession($profession)
    {
        $this->profession = $profession;
    }

    public function getDatenaissance()
    {
        return $this->datenaissance;
    }

    public function setDatenaissance($datenaissance)
    {
        $this->datenaissance = $datenaissance;
    }

    /**
     * @return string
     */
    public function getImageUser()
    {
        return $this->imageUser;
    }

    /**
     * @param string $imageUser
     */
    public function setImageUser($imageUser)
    {
        $this->imageUser = $imageUser;
        if ($imageUser) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTimeImmutable('now');
        }
    }

    /**
     * @return File
     */
    public function getImageFileUser()
    {
        return $this->imageFileUser;
    }

    /**
     * @param File $imageFileUser
     */
    public function setImageFileUser($imageFileUser)
    {
        $this->imageFileUser = $imageFileUser;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }



    public function __construct()
    {
        parent::__construct();
        $this->roles = array('ROLE_USER');
    }

    public function __toString()
    {
        return $this->getUsername();
//        return parent::__toString();
    }


}