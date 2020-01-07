<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * paiement
 *
 * @ORM\Table(name="paiement")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PaiementRepository")
 */
class Paiement
{
    const SCOLARITE = 'SCOLARITE';
    const INSCRIPTION = 'INSCRIPTION';
    const ASSURANCE = 'ASSURANCE';
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datepaiement", type="datetime")
     */
    private $datepaiement;

    /**
     * @var string
     *
     * @ORM\Column(name="sommeapayer", type="decimal", precision=10, scale=0)
     */
    private $sommeapayer;

    /**
     * @var string
     *
     * @ORM\Column(name="montantregler", type="decimal", precision=10, scale=0)
     */
    private $montantregler;

    /**
     * @var string
     *
     * @ORM\Column(name="restapayer", type="decimal", precision=10, scale=0)
     */
    private $restapayer;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string",nullable=false)
     */
    private $type;

    /**
     * @var string
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Enfant"  )
     * @ORM\JoinColumn(name="enfant", referencedColumnName="id")
     */
    private $enfant;

    /**
     * @var string
     *
     * @ORM\Column(name="numeropaiement", type="string", length=255)
     */
    private $numeropaiement;


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
     * Set datepaiement
     *
     * @param \DateTime $datepaiement
     *
     * @return paiement
     */
    public function setDatepaiement($datepaiement)
    {
        $this->datepaiement = $datepaiement;

        return $this;
    }

    /**
     * Get datepaiement
     *
     * @return \DateTime
     */
    public function getDatepaiement()
    {
        return $this->datepaiement;
    }

    /**
     * Set sommeapayer
     *
     * @param string $sommeapayer
     *
     * @return paiement
     */
    public function setSommeapayer($sommeapayer)
    {
        $this->sommeapayer = $sommeapayer;

        return $this;
    }

    /**
     * Get sommeapayer
     *
     * @return string
     */
    public function getSommeapayer()
    {
        return $this->sommeapayer;
    }

    /**
     * Set montantregler
     *
     * @param string $montantregler
     *
     * @return paiement
     */
    public function setMontantregler($montantregler)
    {
        $this->montantregler = $montantregler;

        return $this;
    }

    /**
     * Get montantregler
     *
     * @return string
     */
    public function getMontantregler()
    {
        return $this->montantregler;
    }

    /**
     * Set restapayer
     *
     * @param string $restapayer
     *
     * @return paiement
     */
    public function setRestapayer($restapayer)
    {
        $this->restapayer = $restapayer;

        return $this;
    }

    /**
     * Get restapayer
     *
     * @return string
     */
    public function getRestapayer()
    {
        return $this->restapayer;
    }

    /**
     * Set enfant
     *
     * @param \stdClass $enfant
     *
     * @return paiement
     */
    public function setEnfant($enfant)
    {
        $this->enfant = $enfant;

        return $this;
    }

    /**
     * Get enfant
     *
     * @return \stdClass
     */
    public function getEnfant()
    {
        return $this->enfant;
    }

    /**
     * Set numeropaiement
     *
     * @param string $numeropaiement
     *
     * @return paiement
     */
    public function setNumeropaiement($numeropaiement)
    {
        $this->numeropaiement = $numeropaiement;

        return $this;
    }

    /**
     * Get numeropaiement
     *
     * @return string
     */
    public function getNumeropaiement()
    {
        return $this->numeropaiement;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }


}

