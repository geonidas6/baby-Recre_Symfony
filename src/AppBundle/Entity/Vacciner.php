<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vacciner
 *
 * @ORM\Table(name="vacciner")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\VaccinerRepository")
 */
class Vacciner
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @var string
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Enfant"  )
     * @ORM\JoinColumn(name="enfant", referencedColumnName="id")
     */
    private $enfant;


    /**
     * @var string
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Vaccin"  )
     * @ORM\JoinColumn(name="vaccin", referencedColumnName="id")
     */
    private $vaccin;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set enfant
     *
     * @param string $enfant
     *
     * @return Vacciner
     */
    public function setEnfant($enfant)
    {
        $this->enfant = $enfant;

        return $this;
    }

    /**
     * Get enfant
     *
     * @return string
     */
    public function getEnfant()
    {
        return $this->enfant;
    }

    /**
     * Set vaccin
     *
     * @param string $vaccin
     *
     * @return Vacciner
     */
    public function setVaccin($vaccin)
    {
        $this->vaccin = $vaccin;

        return $this;
    }

    /**
     * Get vaccin
     *
     * @return string
     */
    public function getVaccin()
    {
        return $this->vaccin;
    }
}

