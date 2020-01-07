<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Medicament
 *
 * @ORM\Table(name="medicament")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MedicamentRepository")
 */
class Medicament
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\enfant"  )
     * @ORM\JoinColumn(name="paiement", referencedColumnName="id")
     */
    private $enfant;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="prescrption", type="string", length=255)
     */
    private $prescrption;

    /**
     * @var int
     *
     * @ORM\Column(name="nbrCacherRestant", type="integer")
     */
    private $nbrCacherRestant;


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
     * @return Medicament
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
     * Set name
     *
     * @param string $name
     *
     * @return Medicament
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
     * Set prescrption
     *
     * @param string $prescrption
     *
     * @return Medicament
     */
    public function setPrescrption($prescrption)
    {
        $this->prescrption = $prescrption;

        return $this;
    }

    /**
     * Get prescrption
     *
     * @return string
     */
    public function getPrescrption()
    {
        return $this->prescrption;
    }

    /**
     * Set nbrCacherRestant
     *
     * @param integer $nbrCacherRestant
     *
     * @return Medicament
     */
    public function setNbrCacherRestant($nbrCacherRestant)
    {
        $this->nbrCacherRestant = $nbrCacherRestant;

        return $this;
    }

    /**
     * Get nbrCacherRestant
     *
     * @return int
     */
    public function getNbrCacherRestant()
    {
        return $this->nbrCacherRestant;
    }
}

