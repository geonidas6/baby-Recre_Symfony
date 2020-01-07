<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vaccin
 *
 * @ORM\Table(name="vaccin")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\VaccinRepository")
 */
class Vaccin
{
    const Year = 'Year';
    const Mounth = 'Mounth';
    const  Naissance = 'Naissance';
    const  Week = 'Week';

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
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true, unique=true)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="timeintervale", type="integer")
     */
    private $timeintervale;

    /**
     * @var string
     *
     * @ORM\Column(name="libele", type="string", length=255, nullable=true, unique=false)
     */
    private $libele;






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
     * Set name
     *
     * @param string $name
     *
     * @return Vaccin
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set timeintervale
     *
     * @param integer $timeintervale
     *
     * @return Vaccin
     */
    public function setTimeintervale($timeintervale)
    {
        $this->timeintervale = $timeintervale;

        return $this;
    }

    /**
     * Get timeintervale
     *
     * @return int
     */
    public function getTimeintervale()
    {
        return $this->timeintervale;
    }



    /**
     * @return string
     */
    public function getLibele()
    {
        return $this->libele;
    }

    /**
     * @param string $libele
     */
    public function setLibele($libele)
    {
        $this->libele = $libele;
    }


}

