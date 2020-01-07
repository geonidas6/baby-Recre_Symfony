<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * historiquepaiement
 *
 * @ORM\Table(name="historiquepaiement")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\HistoriquepaiementRepository")
 */
class Historiquepaiement
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
     * @var \DateTime
     *
     * @ORM\Column(name="datedebut", type="datetime")
     */
    private $datedebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datepaiement", type="datetime")
     */
    private $datepaiement;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datefin", type="datetime")
     */
    private $datefin;

    /**
     * @var integer
     *
     * @ORM\Column(name="rest",  type="integer")
     */
    private $rest;

    /**
     * @var integer
     *
     * @ORM\Column(name="montanregler", type="integer")
     */
    private $montanregler;

    /**
     * @var string
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Paiement"  )
     * @ORM\JoinColumn(name="paiement", referencedColumnName="id")
     */
    private $paiement;


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
     * Set datedebut
     *
     * @param \DateTime $datedebut
     *
     * @return historiquepaiement
     */
    public function setDatedebut($datedebut)
    {
        $this->datedebut = $datedebut;

        return $this;
    }

    /**
     * Get datedebut
     *
     * @return \DateTime
     */
    public function getDatedebut()
    {
        return $this->datedebut;
    }

    /**
     * Set datefin
     *
     * @param \DateTime $datefin
     *
     * @return historiquepaiement
     */
    public function setDatefin($datefin)
    {
        $this->datefin = $datefin;

        return $this;
    }

    /**
     * Get datefin
     *
     * @return \DateTime
     */
    public function getDatefin()
    {
        return $this->datefin;
    }

    /**
     * @return int
     */
    public function getRest()
    {
        return $this->rest;
    }

    /**
     * @param int $rest
     */
    public function setRest($rest)
    {
        $this->rest = $rest;
    }


    /**
     * Set paiement
     *
     * @param string $paiement
     *
     * @return historiquepaiement
     */
    public function setPaiement($paiement)
    {
        $this->paiement = $paiement;

        return $this;
    }

    /**
     * Get paiement
     *
     * @return string
     */
    public function getPaiement()
    {
        return $this->paiement;
    }

    /**
     * @return int
     */
    public function getMontanregler()
    {
        return $this->montanregler;
    }

    /**
     * @param int $montanregler
     */
    public function setMontanregler($montanregler)
    {
        $this->montanregler = $montanregler;
    }

    /**
     * @return \DateTime
     */
    public function getDatepaiement()
    {
        return $this->datepaiement;
    }

    /**
     * @param \DateTime $datepaiement
     */
    public function setDatepaiement($datepaiement)
    {
        $this->datepaiement = $datepaiement;
    }


}

