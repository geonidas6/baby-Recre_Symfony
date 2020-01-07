<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Enfant;
use AppBundle\Entity\EnfantHoraire;
use AppBundle\Entity\FicheInscription;
use AppBundle\Entity\Image;
use AppBundle\Entity\Lienfamilliale;
use AppBundle\Entity\Paiement;
use AppBundle\Entity\Tuteur;
use AppBundle\Entity\Vaccin;
use AppBundle\Entity\Vacciner;
use AppBundle\Form\EnfantType;
use AppBundle\Service\FileUploader;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Enfant controller.
 *
 * @Route("enfant")
 */
class EnfantController extends Controller
{
    /**
     * Lists all enfant entities.
     *
     * @Route("/", name="enfant_index")
     * @Method({"GET", "POST"})
     */
    public function indexAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $data = $request->get('data');

        if (null != $data){
            $data = $data['enfant'];
            $enfants = $em->getRepository('AppBundle:Enfant')->findByNomEnfant($data);
            /*dump($enfants);
            die();*/
        }else{
            $enfants = $em->getRepository('AppBundle:Enfant')->findAll();
        }
        $nb = $request->query->get('nb',6);
        $paginator = $this->get('knp_paginator');
        $enfants = $paginator->paginate($enfants,
            $request->query->get('page',1),$nb);
        return $this->render('@App/enfant/index.html.twig', array(
            'enfants' => $enfants,
            'nb' => $nb,
        ));
    }

    /**
     * Lists all enfant entities.
     *
     * @Route("/allTuteurjson", name="allTuteurjson")
     */
    public function allTuteur(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $tuteur = $em->getRepository('AppBundle:Tuteur')->findAll();
        return $tuteur;
    }

        function savePere($data){
        $data = $data['pere'];
            $pere = new Tuteur();
            $em = $this->getDoctrine()->getManager();
           $pere->setNom($data['nompere']);
           $pere->setPrenom($data['prenompere']);
           $pere->setEmail($data['emailpere']);
           //$pere->setEmail('mlk@lkkj.com');
          $pere->setTel($data['telpere']);
           //$pere->setTel(9654654654);
           $pere->setTelwhat($data['portablepere']);
           $pere->setDomicile($data['domiciliepere']);
           $pere->setProfession($data['professionpere']);
           $em->persist($pere);
               $em->flush();
               return $pere;
        }
        function saveMere($data){
            $data = $data['mere'];
            $mere = new Tuteur();
            $em = $this->getDoctrine()->getManager();
            $mere->setNom($data['nommere']);
            $mere->setPrenom($data['prenommere']);
            $mere->setEmail($data['emailmere']);
            $mere->setTel($data['telmere']);
            $mere->setTelwhat($data['portablemere']);
            $mere->setDomicile($data['domiciliemere']);
            $mere->setProfession($data['professionmere']);
            $em->persist($mere);
            $em->flush();
            return $mere;
        }
        function savelien($tuteur,$enfant,$nomfam){
            $lien = new Lienfamilliale();
            $em = $this->getDoctrine()->getManager();
            $lien->setEnfant($enfant);
            $lien->setTuteur($tuteur);
            $lien->setNominationlien($nomfam);
            $em->persist($lien);
            $em->flush();
            return true;
        }

        function savefamun($data){
            $lien = new Tuteur();
            $data = $data['fam1'];
            $em = $this->getDoctrine()->getManager();
            if ((empty($data['nomfam1'])) && (!empty($data['tuteurotherA_existe'])) ){
                $lien = $em->getRepository(Tuteur::class)->find($data['tuteurotherA_existe']);

            }else{
                $lien->setNom($data['nomfam1']);
                $lien->setPrenom($data['prenomfam1']);
                $lien->setDomicile($data['domicilefam1']);
                $lien->setTel($data['telfam1']);
                //$lien->setTel(9235535355);
                $em->persist($lien);
                $em->flush();
            }


            return $lien;
        }

        function savefamdeux($data){
            $lien = new Tuteur();
            $data = $data['fam2'];
            $em = $this->getDoctrine()->getManager();
            if ((empty($data['nomfam2'])) && (!empty($data['tuteurotherB_existe'])) ){
                $lien = $em->getRepository(Tuteur::class)->find($data['tuteurotherB_existe']);

            }else{
                $lien->setNom($data['nomfam2']);
                $lien->setPrenom($data['prenomfam2']);
                $lien->setDomicile($data['domicilefam2']);
                $lien->setTel($data['telfam2']);
                $em->persist($lien);
                $em->flush();
            }
            return $lien;
        }

        function savefamtrois($data){
            $lien = new Tuteur();
            $em = $this->getDoctrine()->getManager();

            if ((empty($data['nomfam3'])) && (!empty($data['tuteurotherC_existe'])) ){
                $lien = $em->getRepository(Tuteur::class)->find($data['tuteurotherC_existe']);

            }else{
                $data = $data['fam3'];
                $lien->setNom($data['nomfam3']);
                $lien->setPrenom($data['prenomfam3']);
                $lien->setDomicile($data['domicilefam3']);
                $lien->setTel($data['telfam3']);
                $em->persist($lien);
                $em->flush();
            }

            return $lien;
        }

        function  FicheInscription($enfant, $data,$horraire){
            $fiche = new FicheInscription();
            $em = $this->getDoctrine()->getManager();

            $fiche->setEnfant($enfant);
            $fiche->setAttente($data['lesattentes']);
            //$fiche->setAutorisation($data['autoriser']);
            $fiche->setCraintes($data['lescraintes']);
            $fiche->setHoraire($horraire);
            $fiche->setPeriode($data['periode']);
            $fiche->setRemarque($data['remarque']);
            $fiche->setAllergie($data['allergie']);
            $fiche->setDateinscription(new \DateTime($data['dateinscription']));
            $fiche->setAutorisation((in_array("autoriser",$data))?$data['autoriser']:false);
            //$fiche->setBiberonqte($data['materiel']['biberonqte']);
            //$fiche->setChangeqte($data['materiel']['changeqte']);
            $fiche->setViande(   (in_array("viande",$data))?$data['viande']:false);
            $fiche->setPoisson(  (in_array("poisson",$data))?$data['poisson']:false);
            $fiche->setOeuf( (in_array("oeuf",$data))?$data['oeuf']:false);
            $fiche->setMangeavecaide( (in_array("mangeavecaide",$data))?$data['mangeavecaide']:false);
           /* $fiche->setLaitqte($data['materiel']['laitqte']);
            $fiche->setCouche($data['materiel']['coucheqte']);
            $fiche->setCqqte($data['materiel']['cqqte']);
            $fiche->setDoudouqte($data['materiel']['doudouqte']);
            $fiche->setMdqte($data['materiel']['mdqte']);*/

            $fiche->setLaitqte(0);
            $fiche->setCouche(0);
            $fiche->setCqqte(0);
            $fiche->setDoudouqte(0);
            $fiche->setMdqte(0);
            $em->persist($fiche);
            $em->flush();
            return true;
        }

        //function vacin faite


        function saveHorraire($data,$enfant){

            $enfantHoraire = new EnfantHoraire();
            $em = $this->getDoctrine()->getManager();
            $enfantHoraire->setEnfant($enfant);
            $enfantHoraire->setLundidebut($data['lundidepart']);
            $enfantHoraire->setLundifin($data['lundifin']);
            $enfantHoraire->setMardidebut($data['mardidepart']);
            $enfantHoraire->setMardifin($data['mardifin']);
            $enfantHoraire->setMercrdidebut($data['mercredidepart']);
            $enfantHoraire->setMercredifin($data['mercredifin']);
            $enfantHoraire->setJeudidebut($data['jeudidepart']);
            $enfantHoraire->setJeudifin($data['jeudifin']);
            $enfantHoraire->setVendredidebut($data['vendredidepart']);
            $enfantHoraire->setVendredifin($data['vendredifin']);
            $enfantHoraire->setSamedidebut($data['samedidepart']);
            $enfantHoraire->setSamedifin($data['samedifin']);
            $enfantHoraire->setDimanchedebut($data['dimanchedepart']);
            $enfantHoraire->setDimachefin($data['dimandefin']);
            $em->persist($enfantHoraire);
            $em->flush();
            return $enfantHoraire;
        }


    /**
     * Creates a new enfant entity.
     *
     * @Route("/new", name="enfant_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request ,  FileUploader $updater)
    {
        $enfant = new Enfant();
        $em = $this->getDoctrine()->getManager();
        $listEnfant = $em->getRepository(Enfant::class)->findAll();
        $form = $this->createForm(EnfantType::class,$enfant);
        $form->handleRequest($request);
        $data =  $request->get('data');

        if (($form->isSubmitted()) && (null != $data)) {
            //enfant image
            if ($form->get('image')->getData()){
                $file = $form->get('image')->getData();
                $acceptable= array("gif","png","jpg","jpeg");
                if(null !== $file && in_array($file->guessExtension(),$acceptable)) {
                    //  $file
                    $fileName = $updater->upload($file,$this->getParameter("enfant_pic_directory"));
                    $image = new Image();
                    $image->setName($fileName);
                    $enfant->setImage($image);
                }else{
                    /*dump("faille enter file session");
                    die();*/
                    $request->getSession()->getFlashBag()->add('notice', ['message'=>'Fichier de type non valide','type'=>'error','title'=>'Error']);
                    return $this->redirectToRoute('enfant_new');
                }
            }



            //$dateinscription = new  \DateTime(date("Y-m-d H:m:s"));
            //$datenaissance =  new  \DateTime($form->getViewData()->getDatenaissance());
            //enfant infos
            $enfant->setDatenaissance(new \DateTime( $data['datenaissance']));
            $enfant->setNom($data['nomenfant']);
            $enfant->setPrenom($data['prenomenfant']);
            $enfant->setSexe($data['sexeenfant']);
            $em->persist($enfant);
            $em->flush();

            //tuteur et ficher inscription infos
            $data['periode'] =  $request->get('periode');
            $data['lundidepart'] = $request->get('lundidepart');
            $data['lundifin'] = $request->get('lundifin');
            $data['mardidepart'] = $request->get('mardidepart');
            $data['mardifin'] = $request->get('mardifin');
            $data['mercredidepart'] = $request->get('mercredidepart');
            $data['mercredifin'] = $request->get('mercredifin');
            $data['jeudidepart'] = $request->get('jeudidepart');
            $data['jeudifin'] = $request->get('jeudifin');
            $data['vendredidepart'] = $request->get('vendredidepart');
            $data['vendredifin'] = $request->get('vendredifin');
            $data['samedidepart'] = $request->get('samedidepart');
            $data['samedifin'] = $request->get('samedifin');
            $data['dimanchedepart'] = $request->get('dimanchedepart');
            $data['dimandefin'] = $request->get('dimandefin');

            //TODO: verifier si c'est un tuteur existent ou pas

            //verifi pere
            if ((empty($data['pere']['nompere'])) && (!empty($data['pere_existe'])) ){
                $pere = $em->getRepository(Tuteur::class)->find($data['pere_existe']);

            }else{
                $pere =  $this->savePere($data);
            }
            if ((empty($data['mere']['nommere'])) && (!empty($data['mere_existe'])) ){
                $mere = $em->getRepository(Tuteur::class)->find($data['mere_existe']);

            }else{
                $mere = $this->saveMere($data);
            }

           /* dump($data);
            die();*/

           $horraire = $this->saveHorraire($data,$enfant);
           $this->savelien($pere,$enfant,'PERE');
           $this->savelien($mere,$enfant,'MERE');
          $famun = $this->savefamun($data);
           $famdeux = $this->savefamdeux($data);
           $famtrois = $this->savefamtrois($data);
            $this->savelien($famun,$enfant,$data['fam1']['lienfam1']);
            $this->savelien($famdeux,$enfant,$data['fam2']['lienfam2']);
            $this->savelien($famtrois,$enfant,$data['fam3']['lienfam3']);

            $this->FicheInscription($enfant,$data,$horraire);



            /*die();*/
            $request->getSession()->getFlashBag()->add('notice', ['message'=>'Enfant Inscrite avec succès.','type'=>'success','title'=>'Succès']);
            return $this->redirectToRoute('enfant_show',['id'=>$enfant->getId()]);
        }else{
            //die();
        }

        $Alltuteur = $this->allTuteur($request);
        return $this->render('@App/enfant/enfant_add/new.html.twig', array(
            'enfant' => $enfant,
            'listeEnfants'=>$listEnfant,
            'form' => $form->createView(),
            'Alltuteurs'=>$Alltuteur
        ));
    }

    /**
     * Finds and displays a enfant entity.
     *
     * @Route("/{id}", name="enfant_show")
     * @Method("GET")
     */
    public function showAction(Enfant $enfant)
    {
        $deleteForm = $this->createDeleteForm($enfant);
        $em = $this->getDoctrine()->getManager();
        $enfantDetails = $em->getRepository(FicheInscription::class)->findByEnfant($enfant);
        $lienfamilliale = $em->getrepository(Lienfamilliale::class)->findByEnfant($enfant);

        $lesvaccinsFaite = $em->getrepository(Vacciner::class)->findBy(
            [
                 'enfant'=>$enfant,
            ]);
        $allVaccin = $em->getrepository(Vaccin::class)->findAll();


        $Paiement_inscription = $em->getrepository(Paiement::class)->findBy([
            'enfant'=>$enfant,
            'type'=>Paiement::INSCRIPTION
        ]);
        $Paiement_assurance = $em->getrepository(Paiement::class)->findBy([
            'enfant'=>$enfant,
            'type'=>Paiement::ASSURANCE
        ]);
        /*dump($Paiement_assurance);
        dump($Paiement_inscription);

                die();*/

        if((count($Paiement_assurance) == 0) || (count($Paiement_inscription) == 0))
            return $this->redirectToRoute('paiement_new');

        /*dump($Paiement);

        die();*/
        //die();


        $interval = date_diff($enfant->getDatenaissance(),new \DateTime(date("Y-m-d H:m:s")));
        $age_lib = '';
        if ($interval->format('%R%a') > 30){
            $age = ($interval->format('%R%a')/30);
            $age_lib = 'mois';
            if ($interval->format('%R%a') > 365){
                $age = ($interval->format('%R%a')/30)/12;
                $age_lib = 'ans';
            }
        }else{
            $age_lib = 'jour';
            $age = $interval->format('%R%a');
        }


        return $this->render('@App/enfant/afficher_enfant/afficher_enfant.html.twig', array(
            'Paiement_inscription' => count($Paiement_inscription),
            'Paiement_assurance' => count($Paiement_assurance),
            'age' => number_format($age),
            'age_lib' => $age_lib,
            'lienfamilliales' => $lienfamilliale,
            'enfantDetails' => $enfantDetails,
            'enfant' => $enfant,
            'lesvaccinsFaites' => $lesvaccinsFaite,
            'allVaccins' => $allVaccin,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing enfant entity.
     *
     * @Route("/{id}/edit", name="enfant_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Enfant $enfant)
    {
        $em = $this->getDoctrine()->getManager();
        $data = $request->get("data");

      if ($data != null) {
          $date = new \DateTime($data["datenaissance"]);
          $enfant->setDatenaissance($date);
          $enfant->setNom($data['nom']);
          $enfant->setPrenom($data['prenom']);
          $enfant->setSexe($data['sexe']);
          $em->flush();

            return $this->redirectToRoute('enfant_edit', array('id' => $enfant->getId()));
        }

        return $this->render('@App/enfant/edit.html.twig', array(
            'enfant' => $enfant,
        ));
    }

    /**
     * @Route("/change_enfant_pic", name="change_enfant_pic")
     */
    public function submitImage(Request $request, FileUploader $updater){
        $file = $request->files->get('picture');
        $acceptable= array("gif","png","jpg","jpeg");
        if(null !== $file && in_array($file->guessExtension(),$acceptable)){
            //  $file
            $fileName = $updater->upload($file,$this->getParameter("enfant_pic_directory"));
            $em = $this->getDoctrine()->getManager();
            $enfant = $this->getDoctrine()->getRepository(Enfant::class)->find($request->get('id'));
            $image = new Image();
            $image->setName($fileName);
            $enfant->setImage($image);
            $em->persist($enfant);
            $em->flush();
            return $this->json(array("success"=>true,
                'name'=>$fileName));
        }

        return new Response(
            $this->json(array("success"=>false,'message'=>"Veuillez soumettre une image valide")),
            Response::HTTP_NOT_ACCEPTABLE,
            array('content-type' => 'application/json'));
    }

    /**
     * Deletes a enfant entity.
     *
     * @Route("/{id}", name="enfant_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Enfant $enfant)
    {
        $form = $this->createDeleteForm($enfant);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($enfant);
            $em->flush();
        }

        return $this->redirectToRoute('enfant_index');
    }

    /**
     * Creates a form to delete a enfant entity.
     *
     * @param Enfant $enfant The enfant entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Enfant $enfant)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('enfant_delete', array('id' => $enfant->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
