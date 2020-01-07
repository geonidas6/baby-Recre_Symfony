<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Messagerie
 *
 * @ORM\Table(name="message")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MessageRepository")
 */
class Message
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
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="sender_id", referencedColumnName="id", nullable=false)
     */
    private $sender;



    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="User" )
     * @ORM\JoinColumn(name="recipient_id", referencedColumnName="id", nullable=false)
     */
    private $recipient;


    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=25)
     */
    private $type;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="sent_date", type="datetime", nullable=false)
     */
    private $dateSent;


    /**
     * @var string
     *
     * @ORM\Column(name="lu", type="boolean",nullable=false,unique=false)
     */
    private $read=false;



    /**
     * @var string
     *
     * @ORM\Column(name="defaultprofile", type="string",nullable=true,unique=false)
     */
    private $defaultprofile;

    /**
     * @var string
     *
     * @ORM\Column(name="contenue", type="string",nullable=true,unique=false)
     */
    private $contenue;







    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Request
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set dateSent
     *
     * @param \DateTime $dateSent
     *
     * @return Request
     */
    public function setDateSent($dateSent)
    {
        $this->dateSent = $dateSent;

        return $this;
    }

    /**
     * Get dateSent
     *
     * @return \DateTime
     */
    public function getDateSent()
    {
        return $this->dateSent;
    }

    /**
     * Set read
     *
     * @param boolean $read
     *
     * @return Request
     */
    public function setRead($read=false)
    {
        $this->read = $read;

        return $this;
    }

    /**
     * Get read
     *
     * @return boolean
     */
    public function getRead()
    {
        return $this->read;
    }



    /**
     * Set defaultprofile
     *
     * @param string $defaultprofile
     *
     * @return Request
     */
    public function setDefaultprofile($defaultprofile = null)
    {
        $this->defaultprofile = $defaultprofile;

        return $this;
    }

    /**
     * Get defaultprofile
     *
     * @return string
     */
    public function getDefaultprofile()
    {
        return $this->defaultprofile;
    }

    /**
     * Set sender
     *
     * @param \AppBundle\Entity\User $sender
     *
     * @return Request
     */
    public function setSender(\AppBundle\Entity\User $sender)
    {
        $this->sender = $sender;

        return $this;
    }

    /**
     * Get sender
     *
     * @return \AppBundle\Entity\User
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * Set recipient
     *
     * @param \AppBundle\Entity\User $recipient
     *
     * @return Request
     */
    public function setRecipient(\AppBundle\Entity\User $recipient)
    {
        $this->recipient = $recipient;

        return $this;
    }

    /**
     * Get recipient
     *
     * @return \AppBundle\Entity\User
     */
    public function getRecipient()
    {
        return $this->recipient;
    }



    /**
     * @return string
     */
    public function getContenue()
    {
        return $this->contenue;
    }

    /**
     * @param string $contenue
     */
    public function setContenue($contenue)
    {
        $this->contenue = $contenue;
    }


    public function __construct()
    {
        $this->dateSent = new \DateTime();
    }
}
