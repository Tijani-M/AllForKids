<?php

namespace SanteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * ListeAppelUrgence
 *
 * @ORM\Entity
 * @ORM\Table(name="liste_appel_urgence")
 * @ORM\Entity(repositoryClass="SanteBundle\Repository\ListeAppelUrgenceRepository")
 * @Vich\Uploadable
 */


class ListeAppelUrgence
{
    /**
     * @var int
     *
     * @ORM\Column(name="idNumUrgence", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idNumUrgence;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $libelleNumUrgence;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $NumUrgence;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="urgence_images", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @return int
     */
    public function getIdNumUrgence()
    {
        return $this->idNumUrgence;
    }

    /**
     * @param int $idNumUrgence
     */
    public function setIdNumUrgence($idNumUrgence)
    {
        $this->idNumUrgence = $idNumUrgence;
    }

    /**
     * @return mixed
     */
    public function getLibelleNumUrgence()
    {
        return $this->libelleNumUrgence;
    }

    /**
     * @param mixed $libelleNumUrgence
     */
    public function setLibelleNumUrgence($libelleNumUrgence)
    {
        $this->libelleNumUrgence = $libelleNumUrgence;
    }

    /**
     * @return mixed
     */
    public function getNumUrgence()
    {
        return $this->NumUrgence;
    }

    /**
     * @param mixed $NumUrgence
     */
    public function setNumUrgence($NumUrgence)
    {
        $this->NumUrgence = $NumUrgence;
    }

    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTimeImmutable('now');
        }
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getImage()
    {
        return $this->image;
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


    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->getLibelleNumUrgence();
    }


}

