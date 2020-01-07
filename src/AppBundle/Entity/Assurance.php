<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Assurance
 *
 * @ORM\Table(name="assurance")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AssuranceRepository")
 */
class Assurance
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Paiement"  )
     * @ORM\JoinColumn(name="paiement", referencedColumnName="id")
     */
    private $paiement;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datedebut", type="date",nullable=false)
     * @Assert\NotBlank(message="Veuillez saisir une date  valide")
     */
    private $datedebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datefin", type="date",nullable=false)
     * @Assert\NotBlank(message="Veuillez saisir une date  valide")
     */
    private $datefin;


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
     * @return string
     */
    public function getEnfant()
    {
        return $this->enfant;
    }

    /**
     * @param string $enfant
     */
    public function setEnfant($enfant)
    {
        $this->enfant = $enfant;
    }

    /**
     * @return string
     */
    public function getPaiement()
    {
        return $this->paiement;
    }

    /**
     * @param string $paiement
     */
    public function setPaiement($paiement)
    {
        $this->paiement = $paiement;
    }

    /**
     * @return \DateTime
     */
    public function getDatedebut()
    {
        return $this->datedebut;
    }

    /**
     * @param \DateTime $datedebut
     */
    public function setDatedebut($datedebut)
    {
        $this->datedebut = $datedebut;
    }

    /**
     * @return \DateTime
     */
    public function getDatefin()
    {
        return $this->datefin;
    }

    /**
     * @param \DateTime $datefin
     */
    public function setDatefin($datefin)
    {
        $this->datefin = $datefin;
    }


}

