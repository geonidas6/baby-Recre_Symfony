<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EnfantMateriel
 *
 * @ORM\Table(name="enfant_materiel")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EnfantMaterielRepository")
 */
class EnfantMateriel
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\paiement"  )
     * @ORM\JoinColumn(name="paiement", referencedColumnName="id")
     */
    private $enfant;

    /**
     * @var string
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Materiel"  )
     * @ORM\JoinColumn(name="paiement", referencedColumnName="id")
     */
    private $materiel;

    /**
     * @var int
     *
     * @ORM\Column(name="quantite", type="integer")
     */
    private $quantite;


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
     * @return EnfantMateriel
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
     * Set materiel
     *
     * @param string $materiel
     *
     * @return EnfantMateriel
     */
    public function setMateriel($materiel)
    {
        $this->materiel = $materiel;

        return $this;
    }

    /**
     * Get materiel
     *
     * @return string
     */
    public function getMateriel()
    {
        return $this->materiel;
    }

    /**
     * Set quantite
     *
     * @param integer $quantite
     *
     * @return EnfantMateriel
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return int
     */
    public function getQuantite()
    {
        return $this->quantite;
    }
}

