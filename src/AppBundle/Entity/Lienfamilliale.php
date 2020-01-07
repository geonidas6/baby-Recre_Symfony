<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * lienfamilliale
 *
 * @ORM\Table(name="lienfamilliale")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LienfamillialeRepository")
 */
class Lienfamilliale
{

    const PERE = 'PERE';
    const MERE = 'MERE';
    const Tante = 'Tante';
    const Frere = 'Frere';
    const Amis = 'Amis';



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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Tuteur"  )
     * @ORM\JoinColumn(name="tuteur", referencedColumnName="id")
     */
    private $tuteur;

    /**
     * @var string
     *
     * @ORM\Column(name="nominationlien", type="string", length=20, nullable=false)
     */
    private $nominationlien ;


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
     * @return lienfamilliale
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
     * Set tuteur
     *
     * @param string $tuteur
     *
     * @return lienfamilliale
     */
    public function setTuteur($tuteur)
    {
        $this->tuteur = $tuteur;

        return $this;
    }

    /**
     * Get tuteur
     *
     * @return string
     */
    public function getTuteur()
    {
        return $this->tuteur;
    }

    /**
     * @return string
     */
    public function getNominationlien()
    {
        return $this->nominationlien;
    }

    /**
     * @param string $nominationlien
     */
    public function setNominationlien($nominationlien)
    {
        $this->nominationlien = $nominationlien;
    }


}

