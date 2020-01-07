<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\Message;
use AppBundle\Entity\Profil_relation;
use AppBundle\Entity\Relation;
use AppBundle\Service\Mesenger;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;


class MessageController extends Controller
{

    /**
     * @Route("/inviter", name="inviter")
     */
    /*
        Traitement de la requete d'invitation
        On recupere l'id de l'enseigne et le mail ou l'identifiant
        de la personne a inviter
    */
    public function inviterARejoindreEnseigne(Request $request, Mesenger $mesenger)
    {
        $user = $this->getUser();
        $enseigne_id = $request->request->get('enseigne');
        $invite_id = $request->request->get('invite');
        $DefaultprofileDeciderParSender = $request->request->get('Defaultprofile');
        $message = array();

        if ($enseigne_id !== null && $invite_id !== null) {
            $em = $this->getDoctrine()->getManager();
            $enseigne = $em->getRepository("AppBundle:Enseigne")->find($enseigne_id);
            $invite = $em->getRepository("AppBundle:User")->loadUserByUsername($invite_id);
            if($invite == null){
                $message['message'] = "Ce utilisateur n'existe pas";
                return $this->json($message,404);
            }
            if($enseigne == null){
                $message['message'] = "L'enseigne n'existe pas";
                return $this->json($message,404);
            }
            /*if ($enseigne->getAdministrator() !== $user) {
                $message['message'] = "Vous n'avez pas effectuer cette opération sur une enseigne dont vous n'êtes pas l'administrateur";
                return $this->json($message,404);
            }*/
            if($enseigne->getAdministrator() == $invite){
                $message['message'] = "Vous ne pouvez pas vous inviter à rejoindre une enseigne dont vous êtes déjà l'administrateur";
                return $this->json($message,404);
            }
            // on doit d'abord verifier que la personne n'est pas deja associee a l'enseigne dans la table relation
            if(count($em->getRepository("AppBundle:Message")->loadMessageBySenderOrRecipient($user,$invite,$enseigne))>0){
                $message['message'] = "Une invitation a déjà été envoyée à/par cet utilisateur";
                //$message['message'] = "Une invitation a déjà été envoyée à cet utilisateur";
                return $this->json($message,404);
            }
            if(count($em->getRepository("AppBundle:Relation")->findBy(['user'=>$invite,'enseigne'=>$enseigne]))>0){
                $message['message'] = "L'invité est déjà abonné à l'enseigne";
                return $this->json($message,404);
            }

            //---debut verification des  profils de l'envoyeur pour savoir si l'inviter n'est pas deja et eleve dans le cas ou le
            //sender est parent de l'enseigne
            $profilSenderAndEnseigne =$this->getDoctrine()
                ->getRepository(Relation::class)
                ->findOneBy(['user'=>$user,'enseigne'=>$enseigne]);
            //il faut recuperer tout les données recipient dans l'entit relation
            $recipientProfile =$this->getDoctrine()
                ->getRepository(Relation::class)
                ->findBy(['user'=>$invite]);


            if(!empty( $profilSenderAndEnseigne)){
                foreach (explode(",",$profilSenderAndEnseigne->getProfile()) as $profile){
                    switch( str_replace("'", "", $profile)) {
                        case 'Parents':
                            if (is_array($recipientProfile)){
                                foreach ($recipientProfile as $reprofile){
                                    if(stristr($reprofile->getProfile(), 'Etudiant',true)) {
                                        $message['message'] = "L'invité est déjà élève dans une autre enseigne";
                                        return $this->json($message,404);
                                    }
                                }
                            }
                            break;
                        default :
                            break;
                    }
                }
            }
            //--fin

            $requete = new Message();
            $requete->setType(Message::INVITATION);
            if(($DefaultprofileDeciderParSender != "") && ($DefaultprofileDeciderParSender != "undefined")){$requete->setDefaultprofile($DefaultprofileDeciderParSender);}
            /*$requete->setSender($user);
            $requete->setRecipient($invite);
            $requete->setEnseigne($enseigne);
            $message->setRead(false);
            $em->persist($requete);
            $em->flush();*/
            $mesenger->Sendmessage($user,$invite,Message::INVITATION,null,$enseigne);


            $message['message'] = "Invitation envoyée avec succès ";
            return $this->json($message,200) ;
        }
        $message['message'] = "Veuillez spécifier tous les paramètres de la requète";
        return $this->json($message,404) ;
    }


    /**
     * @Route("/demande", name="demande_enseigne")
     */
    /*
        Une personne demande a rejoindre une enseigne
        On recupere l'id de l'enseigne que l'individu veut rejoindre
     */
    public function demanderARejoindreEnseigne(Request $request,Mesenger $mesenger)
    {
        $idEnseigne = $request->request->get("enseigne");
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $enseigne_repo = $em->getRepository("AppBundle:Enseigne");
        $enseigne = $enseigne_repo->find($idEnseigne);
        if ($enseigne !== null) {
            if ($user == $enseigne->getAdministrator()) {
                return $this->json(['message' => 'Vous ne pouvez pas vous abonner à votre propre enseigne'], '400');
            }

            $message_repo = $em->getRepository("AppBundle:Message");
            if (count($message_repo->loadMessageBySenderOrRecipient($user,$enseigne->getAdministrator(),$enseigne)) > 0) {
                return $this->json(['message' => 'Vous avez déjà envoyé une demande d\'abonnement à cette enseigne'], '400');
            }

           /* $message = new Message();
            $message->setSender($user);
            $message->setEnseigne($enseigne);
            $message->setRecipient($enseigne->getAdministrator());
            $message->setType(Message::AFFECTATION);
            $message->setRead(false);
            $em->persist($message);
            $em->flush();*/
            $mesenger->Sendmessage($user,$enseigne->getAdministrator(),Message::AFFECTATION,null,$enseigne);

            return $this->json(['message' => 'Demande envoyée avec succès'], '200');
        }
        return $this->json(['message' => 'Cet enseigne n\'existe pas'], '400');
    }

    /**
     * @Route("/liste_message", name="liste_message")
     */
    /*
        Recuperer la liste des demandes a rejoindres une enseigne
        destinees a un individu
     */
    public function listeMessages(Request $request){
        // Recuperer la liste des messages destinees à un user
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $repo = $this->getDoctrine()->getRepository("AppBundle:Message");
        $nb = $request->query->get('nb',5);
        $paginator = $this->get('knp_paginator');
        $messages = $paginator->paginate($repo->findMessageByRecipient($user),
            $request->query->get('page',1),
            $nb);

        //faire tout a  été lu
        $statut = $repo->findBy(["recipient"=>$user]);
        foreach ($statut as $read){
            $read->setRead(true);
        }
        $em->flush();

        return $this->render('@App/message/mes_messages.html.twig',['messages'=>$messages]);
    }


    /*
    /**
     * @Route("/send_invitation/{id}", name="send_invitation")
     */
    /*
    public function Invitation(Request $request, $id)
    {
        if ($this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            if ($this->getUser()->getRoles()[0] == "ROLE_ADMIN") {


                $message = new Message();
                $message->setSender($this->getUser());

                $form = $this->createFormBuilder($message)
                    ->add('idrecipient')
                    ->add('save', SubmitType::class, ['label' => 'Envoyer'])
                    ->getForm();

                $id_enseigne = $request->get("id");
                if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {


                    $date = new \DateTime('now');
                    $stimestamp = $date->format('m-d-Y H:i:s');
                    //TODO: il faut remettre la datemessage qui dans entité messagerie a requier puis corriger leuur ici

                    $recipient = $this->getDoctrine()->getRepository(User::class);
                    $recipient_email = $messagerie->getIdrecipient();
                    $em = $this->getDoctrine()->getManager();

                    $RAW_QUERY = "SELECT id FROM fos_user where email = '$recipient_email' ;";

                    $statement = $em->getConnection()->prepare($RAW_QUERY);
                    $statement->execute();

                    $id_recipient = $statement->fetchAll();


                   if (isset($id_recipient[0]['id'])){


                    $sender = $this->getUser()->getId();
                    $messagerie->setType('INVITATION');
                   // $messagerie->setDatemessage($stimestamp);
                    $messagerie->setIdrecipient($id_recipient[0]['id']);
                    $messagerie->setIdsender($sender);
                    $messagerie->setLu(0);
                    $messagerie->setIdenseigne($id_enseigne);

                    $em = $this->getDoctrine()->getManager();
                    $em->persist($messagerie);
                    $em->flush();

                    $request->getSession()->getFlashBag()->add('success', 'Invitation envoyer avec succès');

                   // return $this->redirectToRoute('profil');
                   }else{
                       $request->getSession()->getFlashBag()->add('error', 'erreur mail');
                   }
                }
                $repository = $this->getDoctrine()->getRepository(Enseigne::class);
                $infos_enseigne = $repository->findOneById($id_enseigne);


                return $this->render('@App/user/invitation.html.twig', array(
                    'form' => $form->createView(),
                    'infos_enseigne'=>$infos_enseigne,
                ));
            }
        }

    }
*/

    /*
    /**
     * @Route("/show_message/{id}", name="show_message")
     */
    /*
    public function show_message(Request $request)
    {
        $is_message = $request->get("id");

        return $this->render('@App/user/show_message.html.twig' );
    }
    */


    /**
     * @param $sender
     * @param $recipient
     * @param $type
     * @param $contenu
     * @param $enseigne
     */

    /*public function SendMessage($sender,$recipient,$type,$contenu,$enseigne){
        $em = $this->getDoctrine()->getManager();
        $message = new Message();
        $message->setContenue($contenu);
        $message->setSender($sender);
        $message->setRecipient($recipient);
        $message->setEnseigne($enseigne);
        $message->setType($type);
        $em->persist($message);
        $em->flush();
    }*/







}