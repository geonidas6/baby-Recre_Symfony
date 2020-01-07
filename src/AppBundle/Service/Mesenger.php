<?php
/**
 * Created by PhpStorm.
 * User: geonidas
 * Date: 25/04/2019
 * Time: 13:13
 */

namespace AppBundle\Service;

use AppBundle\Entity\Message;
use Doctrine\ORM\EntityManager;



class Mesenger
{
    protected $em ;

    function __construct(EntityManager $em)
    {
        $this->em = $em;
    }


    public function Sendmessage($sender,$recipient,$type,$contenu,$enseigne){


        $message = new Message();
        $message->setContenue($contenu);
        $message->setSender($sender);
        $message->setRecipient($recipient);
        $message->setEnseigne($enseigne);
        $message->setType($type);
        $this->em->persist($message);
        $this->em->flush();
        return true;
    }

}