<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Creche
 *
 * @ORM\Table(name="creche")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CrecheRepository")
 */
class Creche
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
     * @ORM\Column(name="heureOuverture", type="time")
     */
    private $heureOuverture;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heurFermeture", type="time")
     */
    private $heurFermeture;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=255)
     */
    private $nome;


    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     * @Assert\NotBlank(message="Veuillez remplir ce champ")
     * @Assert\Email(message="Veuillez saisir un email valide")
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="situation", type="string", length=255)
     * @Assert\NotBlank(message="Ne peut être vide")
     */
    private $situation;

    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=255)
     * @Assert\NotBlank(message="Ne peut être vide")
     */
    private $tel;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreation", type="date")
     */
    private $dateCreation;

    /**
     * @var integer
     *
     * @ORM\Column(name="assurance", type="integer", nullable=false)
     */
    private $assurance;
    /**
     * @var integer
     *
     * @ORM\Column(name="scolarite", type="integer", nullable=false)
     */
    private $scolarite;
    /**
     * @var integer
     *
     * @ORM\Column(name="fraisinscription", type="integer", nullable=false)
     */
    private $fraisinscription;


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
     * Set heureOuverture
     *
     * @param \DateTime $heureOuverture
     *
     * @return Creche
     */
    public function setHeureOuverture($heureOuverture)
    {
        $this->heureOuverture = $heureOuverture;

        return $this;
    }

    /**
     * Get heureOuverture
     *
     * @return \DateTime
     */
    public function getHeureOuverture()
    {
        return $this->heureOuverture;
    }

    /**
     * Set heurFermeture
     *
     * @param \DateTime $heurFermeture
     *
     * @return Creche
     */
    public function setHeurFermeture($heurFermeture)
    {
        $this->heurFermeture = $heurFermeture;

        return $this;
    }

    /**
     * Get heurFermeture
     *
     * @return \DateTime
     */
    public function getHeurFermeture()
    {
        return $this->heurFermeture;
    }

    /**
     * Set nome
     *
     * @param string $nome
     *
     * @return Creche
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     *
     * @return Creche
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * @return int
     */
    public function getAssurance()
    {
        return $this->assurance;
    }

    /**
     * @param int $assurance
     */
    public function setAssurance($assurance)
    {
        $this->assurance = $assurance;
    }

    /**
     * @return int
     */
    public function getScolarite()
    {
        return $this->scolarite;
    }

    /**
     * @param int $scolarite
     */
    public function setScolarite($scolarite)
    {
        $this->scolarite = $scolarite;
    }

    /**
     * @return int
     */
    public function getFraisinscription()
    {
        return $this->fraisinscription;
    }

    /**
     * @param int $fraisinscription
     */
    public function setFraisinscription($fraisinscription)
    {
        $this->fraisinscription = $fraisinscription;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getSituation()
    {
        return $this->situation;
    }

    /**
     * @param string $situation
     */
    public function setSituation($situation)
    {
        $this->situation = $situation;
    }

    /**
     * @return string
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @param string $tel
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    }



}

