<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FicheInscription
 *
 * @ORM\Table(name="fiche_inscription")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FicheInscriptionRepository")
 */
class FicheInscription
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
     * @ORM\Column(name="attente", type="string", length=255)
     */
    private $attente;

    /**
     * @var string
     *
     * @ORM\Column(name="craintes", type="string", length=255)
     */
    private $craintes;

    /**
     * @var string
     *
     * @ORM\Column(name="remarque", type="string", length=255)
     */
    private $remarque;

    /**
     * @var string
     *
     * @ORM\Column(name="periode", type="string", length=255)
     */
    private $periode;

    /**
     * @var string
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\EnfantHoraire"  )
     * @ORM\JoinColumn(name="horraire", referencedColumnName="id")
     */
    private $horaire;



    /**
     * @var boolean
     *
     * @ORM\Column(name="autorisation", type="boolean", nullable=true)
     */
    private $autorisation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateinscription", type="datetime",nullable=false)
     */
    private $dateinscription;


    /**
     * @var string
     *
     * @ORM\Column(name="allergie", type="string", length=255, nullable=true)
     */
    private $allergie ;

    /**
     * @var boolean
     *
     * @ORM\Column(name="mangeavecaide", type="boolean", nullable=true)
     */
    private $mangeavecaide ;

    /**
     * @var boolean
     *
     * @ORM\Column(name="oeuf", type="boolean", nullable=true)
     */
    private $oeuf ;

    /**
     * @var boolean
     *
     * @ORM\Column(name="poisson", type="boolean", nullable=true)
     */
    private $poisson ;

    /**
     * @var boolean
     *
     * @ORM\Column(name="viande", type="boolean", nullable=true)
     */
    private $viande ;

    /**
     * @var integer
     *
     * @ORM\Column(name="couche", type="integer", length=5, nullable=true)
     */
    private $couche ;

    /**
     * @var integer
     *
     * @ORM\Column(name="laitqte", type="integer", nullable=true)
     */
    private $laitqte ;

    /**
     * @var integer
     *
     * @ORM\Column(name="changeqte", type="integer", nullable=true)
     */
    private $changeqte ;

    /**
     * @var integer
     *
     * @ORM\Column(name="doudouqte", type="integer", length=2, nullable=true)
     */
    private $doudouqte ;

    /**
     * @var integer
     *
     * @ORM\Column(name="cqqte", type="integer", length=2, nullable=true)
     */
    private $cqqte ;

    /**
     * @var integer
     *
     * @ORM\Column(name="mdqte", type="integer", length=2, nullable=true)
     */
    private $mdqte ;

    /**
     * @var integer
     *
     * @ORM\Column(name="biberonqte", type="integer", length=2, nullable=true)
     */
    private $biberonqte ;






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
     * @return FicheInscription
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
     * Set attente
     *
     * @param string $attente
     *
     * @return FicheInscription
     */
    public function setAttente($attente)
    {
        $this->attente = $attente;

        return $this;
    }

    /**
     * Get attente
     *
     * @return string
     */
    public function getAttente()
    {
        return $this->attente;
    }

    /**
     * Set craintes
     *
     * @param string $craintes
     *
     * @return FicheInscription
     */
    public function setCraintes($craintes)
    {
        $this->craintes = $craintes;

        return $this;
    }

    /**
     * Get craintes
     *
     * @return string
     */
    public function getCraintes()
    {
        return $this->craintes;
    }

    /**
     * Set remarque
     *
     * @param string $remarque
     *
     * @return FicheInscription
     */
    public function setRemarque($remarque)
    {
        $this->remarque = $remarque;

        return $this;
    }

    /**
     * Get remarque
     *
     * @return string
     */
    public function getRemarque()
    {
        return $this->remarque;
    }

    /**
     * Set periode
     *
     * @param string $periode
     *
     * @return FicheInscription
     */
    public function setPeriode($periode)
    {
        $this->periode = $periode;

        return $this;
    }

    /**
     * Get periode
     *
     * @return string
     */
    public function getPeriode()
    {
        return $this->periode;
    }

    /**
     * @return string
     */
    public function getHoraire()
    {
        return $this->horaire;
    }

    /**
     * @param string $horaire
     */
    public function setHoraire($horaire)
    {
        $this->horaire = $horaire;
    }




    /**
     * Set autorisation
     *
     * @param string $autorisation
     *
     * @return FicheInscription
     */
    public function setAutorisation($autorisation)
    {
        $this->autorisation = $autorisation;

        return $this;
    }

    /**
     * Get autorisation
     *
     * @return string
     */
    public function getAutorisation()
    {
        return $this->autorisation;
    }

    /**
     * Set dateinscription
     *
     * @param \DateTime $dateinscription
     *
     * @return FicheInscription
     */
    public function setDateinscription($dateinscription)
    {
        $this->dateinscription = $dateinscription;

        return $this;
    }

    /**
     * Get dateinscription
     *
     * @return \DateTime
     */
    public function getDateinscription()
    {
        return $this->dateinscription;
    }
    /**
     * @return string
     */
    public function getAllergie()
    {
        return $this->allergie;
    }

    /**
     * @param string $allergie
     */
    public function setAllergie($allergie)
    {
        $this->allergie = $allergie;
    }

    /**
     * @return bool
     */
    public function isMangeavecaide()
    {
        return $this->mangeavecaide;
    }

    /**
     * @param bool $mangeavecaide
     */
    public function setMangeavecaide($mangeavecaide)
    {
        $this->mangeavecaide = $mangeavecaide;
    }

    /**
     * @return bool
     */
    public function isOeuf()
    {
        return $this->oeuf;
    }

    /**
     * @param bool $oeuf
     */
    public function setOeuf($oeuf)
    {
        $this->oeuf = $oeuf;
    }

    /**
     * @return bool
     */
    public function isPoisson()
    {
        return $this->poisson;
    }

    /**
     * @param bool $poisson
     */
    public function setPoisson($poisson)
    {
        $this->poisson = $poisson;
    }

    /**
     * @return bool
     */
    public function isViande()
    {
        return $this->viande;
    }

    /**
     * @param bool $viande
     */
    public function setViande($viande)
    {
        $this->viande = $viande;
    }

    /**
     * @return int
     */
    public function getCouche()
    {
        return $this->couche;
    }

    /**
     * @param int $couche
     */
    public function setCouche($couche)
    {
        $this->couche = $couche;
    }

    /**
     * @return int
     */
    public function getLaitqte()
    {
        return $this->laitqte;
    }

    /**
     * @param int $laitqte
     */
    public function setLaitqte($laitqte)
    {
        $this->laitqte = $laitqte;
    }

    /**
     * @return int
     */
    public function getChangeqte()
    {
        return $this->changeqte;
    }

    /**
     * @param int $changeqte
     */
    public function setChangeqte($changeqte)
    {
        $this->changeqte = $changeqte;
    }

    /**
     * @return int
     */
    public function getDoudouqte()
    {
        return $this->doudouqte;
    }

    /**
     * @param int $doudouqte
     */
    public function setDoudouqte($doudouqte)
    {
        $this->doudouqte = $doudouqte;
    }

    /**
     * @return int
     */
    public function getCqqte()
    {
        return $this->cqqte;
    }

    /**
     * @param int $cqqte
     */
    public function setCqqte($cqqte)
    {
        $this->cqqte = $cqqte;
    }

    /**
     * @return int
     */
    public function getBiberonqte()
    {
        return $this->biberonqte;
    }

    /**
     * @param int $biberonqte
     */
    public function setBiberonqte($biberonqte)
    {
        $this->biberonqte = $biberonqte;
    }

    /**
     * @return int
     */
    public function getMdqte()
    {
        return $this->mdqte;
    }

    /**
     * @param int $mdqte
     */
    public function setMdqte($mdqte)
    {
        $this->mdqte = $mdqte;
    }


}

