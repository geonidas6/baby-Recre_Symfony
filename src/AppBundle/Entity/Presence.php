<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * presence
 *
 * @ORM\Table(name="presence")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PresenceRepository")
 */
class Presence
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
     * @ORM\Column(name="day", type="date")
     */
    private $day;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heurarriver", type="time")
     */
    private $heurarriver;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heurdepart", type="time")
     */
    private $heurdepart;

    /**
     * @var string
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Enfant"  )
     * @ORM\JoinColumn(name="enfant", referencedColumnName="id")
     */
    private $enfant;


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
     * Set day
     *
     * @param \DateTime $day
     *
     * @return presence
     */
    public function setDay($day)
    {
        $this->day = $day;

        return $this;
    }

    /**
     * Get day
     *
     * @return \DateTime
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * Set heurarriver
     *
     * @param \DateTime $heurarriver
     *
     * @return presence
     */
    public function setHeurarriver($heurarriver)
    {
        $this->heurarriver = $heurarriver;

        return $this;
    }

    /**
     * Get heurarriver
     *
     * @return \DateTime
     */
    public function getHeurarriver()
    {
        return $this->heurarriver;
    }

    /**
     * Set heurdepart
     *
     * @param \DateTime $heurdepart
     *
     * @return presence
     */
    public function setHeurdepart($heurdepart)
    {
        $this->heurdepart = $heurdepart;

        return $this;
    }

    /**
     * Get heurdepart
     *
     * @return \DateTime
     */
    public function getHeurdepart()
    {
        return $this->heurdepart;
    }

    /**
     * Set enfant
     *
     * @param \stdClass $enfant
     *
     * @return presence
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
}

