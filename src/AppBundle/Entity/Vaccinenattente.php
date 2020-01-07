<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vaccinenattente
 *
 * @ORM\Table(name="vaccinenattente")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\VaccinenattenteRepository")
 */
class Vaccinenattente
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Vaccin"  )
     * @ORM\JoinColumn(name="paiement", referencedColumnName="id")
     */
    private $vaccin;

    /**
     * @var bool
     *
     * @ORM\Column(name="etat", type="boolean")
     */
    private $etat;

    /**
     * @var string
     *
     * @ORM\Column(name="intervaletemps", type="string", length=255)
     */
    private $intervaletemps;


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
     * Set vaccin
     *
     * @param string $vaccin
     *
     * @return Vaccinenattente
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

    /**
     * Set etat
     *
     * @param boolean $etat
     *
     * @return Vaccinenattente
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return bool
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set intervaletemps
     *
     * @param string $intervaletemps
     *
     * @return Vaccinenattente
     */
    public function setIntervaletemps($intervaletemps)
    {
        $this->intervaletemps = $intervaletemps;

        return $this;
    }

    /**
     * Get intervaletemps
     *
     * @return string
     */
    public function getIntervaletemps()
    {
        return $this->intervaletemps;
    }
}

