<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tuteur
 *
 * @ORM\Table(name="tuteur")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TuteurRepository")
 */
class Tuteur
{

    const Fille = 'Fille';
    const Garcon = 'Garcon';
    const Soeur = 'Soeur';
    const Oncle = 'Oncle';
    const Tante = 'Tante';
    const Autre = 'Autre';
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
     * @ORM\Column(name="nom", type="string", length=25)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=50)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="domicile", type="string", length=50)
     */
    private $domicile;

    /**
     * @var string
     *
     * @ORM\Column(name="profession", type="string", length=50,nullable=true)
     */
    private $profession;

    /**
     * @var string
     *
     * @ORM\Column(name="telwhat", type="string", length=16,nullable=true)
     */
    private $telwhat;

    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=16)
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, unique=true,nullable=true)
     */
    private $email;



    /**
     * @var string
     *
     * @ORM\OneToOne(targetEntity="Image", cascade={"persist","remove"})
     * @ORM\JoinColumn(name="image_id", referencedColumnName="id", nullable=true)
     */
    private $image;


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
     * Set nom
     *
     * @param string $nom
     *
     * @return Tuteur
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Tuteur
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set telwhat
     *
     * @param string $telwhat
     *
     * @return Tuteur
     */
    public function setTelwhat($telwhat)
    {
        $this->telwhat = $telwhat;

        return $this;
    }

    /**
     * Get telwhat
     *
     * @return string
     */
    public function getTelwhat()
    {
        return $this->telwhat;
    }

    /**
     * Set tel
     *
     * @param string $tel
     *
     * @return Tuteur
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Tuteur
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set image
     *
     * @param \AppBundle\Entity\Image $image
     *
     * @return User
     */
    public function setImage(\AppBundle\Entity\Image $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \AppBundle\Entity\Image
     */
    public function getImage()
    {
        return $this->image;
    }





    /**
     * @return string
     */
    public function getDomicile()
    {
        return $this->domicile;
    }

    /**
     * @param string $domicile
     */
    public function setDomicile($domicile)
    {
        $this->domicile = $domicile;
    }

    /**
     * @return string
     */
    public function getProfession()
    {
        return $this->profession;
    }

    /**
     * @param string $profession
     */
    public function setProfession($profession)
    {
        $this->profession = $profession;
    }



}

