<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EnfantHoraire
 *
 * @ORM\Table(name="enfant_horaire")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EnfantHoraireRepository")
 */
class EnfantHoraire
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
     *
     * @ORM\Column(name="lundidebut", type="string", nullable=true)
     */
    private $lundidebut;

    /**
     * @var string
     *
     * @ORM\Column(name="lundifin", type="string", nullable=true)
     */
    private $lundifin;

    /**
     * @var string
     *
     * @ORM\Column(name="mardidebut", type="string", nullable=true)
     */
    private $mardidebut;

    /**
     * @var string
     *
     * @ORM\Column(name="mardifin", type="string", nullable=true)
     */
    private $mardifin;

    /**
     * @var string
     *
     * @ORM\Column(name="mercrdidebut", type="string", nullable=true)
     */
    private $mercrdidebut;

    /**
     * @var string
     *
     * @ORM\Column(name="mercredifin", type="string", nullable=true)
     */
    private $mercredifin;

    /**
     * @var string
     *
     * @ORM\Column(name="jeudidebut", type="string", nullable=true)
     */
    private $jeudidebut;

    /**
     * @var string
     *
     * @ORM\Column(name="jeudifin", type="string", nullable=true)
     */
    private $jeudifin;

    /**
     * @var string
     *
     * @ORM\Column(name="vendredidebut", type="string", nullable=true)
     */
    private $vendredidebut;

    /**
     * @var string
     *
     * @ORM\Column(name="vendredifin", type="string", nullable=true)
     */
    private $vendredifin;

    /**
     * @var string
     *
     * @ORM\Column(name="samedidebut", type="string", nullable=true)
     */
    private $samedidebut;

    /**
     * @var string
     *
     * @ORM\Column(name="samedifin", type="string", nullable=true)
     */
    private $samedifin;

    /**
     * @var string
     *
     * @ORM\Column(name="dimanchedebut", type="string", nullable=true)
     */
    private $dimanchedebut;

    /**
     * @var string
     *
     * @ORM\Column(name="dimachefin", type="string", nullable=true)
     */
    private $dimachefin;



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
     * @return EnfantHoraire
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
     * Set lundidebut
     *
     * @param string $lundidebut
     *
     * @return EnfantHoraire
     */
    public function setLundidebut($lundidebut)
    {
        $this->lundidebut = $lundidebut;

        return $this;
    }

    /**
     * Get lundidebut
     *
     * @return string
     */
    public function getLundidebut()
    {
        return $this->lundidebut;
    }

    /**
     * Set lundifin
     *
     * @param string $lundifin
     *
     * @return EnfantHoraire
     */
    public function setLundifin($lundifin)
    {
        $this->lundifin = $lundifin;

        return $this;
    }

    /**
     * Get lundifin
     *
     * @return string
     */
    public function getLundifin()
    {
        return $this->lundifin;
    }

    /**
     * Set mardidebut
     *
     * @param string $mardidebut
     *
     * @return EnfantHoraire
     */
    public function setMardidebut($mardidebut)
    {
        $this->mardidebut = $mardidebut;

        return $this;
    }

    /**
     * Get mardidebut
     *
     * @return string
     */
    public function getMardidebut()
    {
        return $this->mardidebut;
    }

    /**
     * Set mardifin
     *
     * @param string $mardifin
     *
     * @return EnfantHoraire
     */
    public function setMardifin($mardifin)
    {
        $this->mardifin = $mardifin;

        return $this;
    }

    /**
     * Get mardifin
     *
     * @return string
     */
    public function getMardifin()
    {
        return $this->mardifin;
    }

    /**
     * Set mercrdidebut
     *
     * @param string $mercrdidebut
     *
     * @return EnfantHoraire
     */
    public function setMercrdidebut($mercrdidebut)
    {
        $this->mercrdidebut = $mercrdidebut;

        return $this;
    }

    /**
     * Get mercrdidebut
     *
     * @return string
     */
    public function getMercrdidebut()
    {
        return $this->mercrdidebut;
    }

    /**
     * Set mercredifin
     *
     * @param string $mercredifin
     *
     * @return EnfantHoraire
     */
    public function setMercredifin($mercredifin)
    {
        $this->mercredifin = $mercredifin;

        return $this;
    }

    /**
     * Get mercredifin
     *
     * @return string
     */
    public function getMercredifin()
    {
        return $this->mercredifin;
    }

    /**
     * Set jeudidebut
     *
     * @param string $jeudidebut
     *
     * @return EnfantHoraire
     */
    public function setJeudidebut($jeudidebut)
    {
        $this->jeudidebut = $jeudidebut;

        return $this;
    }

    /**
     * Get jeudidebut
     *
     * @return string
     */
    public function getJeudidebut()
    {
        return $this->jeudidebut;
    }

    /**
     * Set jeudifin
     *
     * @param string $jeudifin
     *
     * @return EnfantHoraire
     */
    public function setJeudifin($jeudifin)
    {
        $this->jeudifin = $jeudifin;

        return $this;
    }

    /**
     * Get jeudifin
     *
     * @return string
     */
    public function getJeudifin()
    {
        return $this->jeudifin;
    }

    /**
     * Set vendredidebut
     *
     * @param string $vendredidebut
     *
     * @return EnfantHoraire
     */
    public function setVendredidebut($vendredidebut)
    {
        $this->vendredidebut = $vendredidebut;

        return $this;
    }

    /**
     * Get vendredidebut
     *
     * @return string
     */
    public function getVendredidebut()
    {
        return $this->vendredidebut;
    }

    /**
     * Set vendredifin
     *
     * @param string $vendredifin
     *
     * @return EnfantHoraire
     */
    public function setVendredifin($vendredifin)
    {
        $this->vendredifin = $vendredifin;

        return $this;
    }

    /**
     * Get vendredifin
     *
     * @return string
     */
    public function getVendredifin()
    {
        return $this->vendredifin;
    }

    /**
     * Set samedidebut
     *
     * @param string $samedidebut
     *
     * @return EnfantHoraire
     */
    public function setSamedidebut($samedidebut)
    {
        $this->samedidebut = $samedidebut;

        return $this;
    }

    /**
     * Get samedidebut
     *
     * @return string
     */
    public function getSamedidebut()
    {
        return $this->samedidebut;
    }

    /**
     * Set samedifin
     *
     * @param string $samedifin
     *
     * @return EnfantHoraire
     */
    public function setSamedifin($samedifin)
    {
        $this->samedifin = $samedifin;

        return $this;
    }

    /**
     * Get samedifin
     *
     * @return string
     */
    public function getSamedifin()
    {
        return $this->samedifin;
    }

    /**
     * Set dimanchedebut
     *
     * @param string $dimanchedebut
     *
     * @return EnfantHoraire
     */
    public function setDimanchedebut($dimanchedebut)
    {
        $this->dimanchedebut = $dimanchedebut;

        return $this;
    }

    /**
     * Get dimanchedebut
     *
     * @return string
     */
    public function getDimanchedebut()
    {
        return $this->dimanchedebut;
    }

    /**
     * Set dimachefin
     *
     * @param string $dimachefin
     *
     * @return EnfantHoraire
     */
    public function setDimachefin($dimachefin)
    {
        $this->dimachefin = $dimachefin;

        return $this;
    }

    /**
     * Get dimachefin
     *
     * @return string
     */
    public function getDimachefin()
    {
        return $this->dimachefin;
    }
}

