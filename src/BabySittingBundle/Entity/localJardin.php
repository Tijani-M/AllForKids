<?php
namespace BabySittingBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class localJardin
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
     * @ORM\ManyToOne(targetEntity="BabySittingBundle\Entity\Jardins", inversedBy="id")
     * @ORM\JoinColumn(name="jardins_id", referencedColumnName="id")
     */
    private $id_jardins;




}
