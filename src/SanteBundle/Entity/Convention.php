<?php

namespace SanteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Convention
 *
 * @ORM\Table(name="convention")
 * @ORM\Entity(repositoryClass="SanteBundle\Repository\ConventionRepository")
 * @Vich\Uploadable
 */
class Convention
{
    /**
     * @var int
     *
     * @ORM\Column(name="idConv", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idConv;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $libelleConv;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $ObservConv;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $imageCv;

    /**
     * @Vich\UploadableField(mapping="convention_images", fileNameProperty="imageCv")
     * @var File
     */
    private $imageFileCv;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @return int
     */
    public function getIdConv()
    {
        return $this->idConv;
    }

    /**
     * @param int $idConv
     */
    public function setIdConv($idConv)
    {
        $this->idConv = $idConv;
    }

    /**
     * @return mixed
     */
    public function getLibelleConv()
    {
        return $this->libelleConv;
    }

    /**
     * @param mixed $libelleConv
     */
    public function setLibelleConv($libelleConv)
    {
        $this->libelleConv = $libelleConv;
    }

    /**
     * @return mixed
     */
    public function getObservConv()
    {
        return $this->ObservConv;
    }

    /**
     * @param mixed $ObservConv
     */
    public function setObservConv($ObservConv)
    {
        $this->ObservConv = $ObservConv;
    }

    /**
     * @return string
     */
    public function getImageCv()
    {
        return $this->imageCv;
    }


    public function setImageCv($imageCv)
    {
        $this->imageCv = $imageCv;
    }


    public function getImageFileCv()
    {
        return $this->imageFileCv;
    }


    public function setImageFileCv($imageCv)
    {
        $this->imageFileCv = $imageCv;

        if ($imageCv) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTimeImmutable('now');
        }
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
        return $this->getLibelleConv();
    }

}

