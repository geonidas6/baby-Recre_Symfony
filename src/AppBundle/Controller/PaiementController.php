<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Assurance;
use AppBundle\Entity\Creche;
use AppBundle\Entity\Enfant;
use AppBundle\Entity\FicheInscription;
use AppBundle\Entity\Historiquepaiement;
use AppBundle\Entity\Paiement;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Paiement controller.
 *
 * @Route("paiement")
 */
class PaiementController extends Controller
{
    /**
     * Lists all paiement entities.
     *
     * @Route("/reglement/{id}", name="reglement")
     * @Method("GET")
     */
    public function reglement(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $paiements = $em->getRepository('AppBundle:Paiement')->find($request->get('id'));
        $Historiquepaiement = $em->getRepository('AppBundle:Historiquepaiement')->findBy(['paiement'=>$paiements]);
/*dump($paiements);
dump($Historiquepaiement);
die();*/
        return $this->render('@App/paiement/reglement.html.twig', array(
            'datedebut' => (count($Historiquepaiement) > 0)?$Historiquepaiement[0]->getDatedebut():'',
            'datefin' => (count($Historiquepaiement) > 0)?$Historiquepaiement[0]->getDatefin():'',

//            'datedebut' => $Historiquepaiement[0]->getDatedebut(),
//            'datefin' => $Historiquepaiement[0]->getDatefin(),
            'Historiquepaiement' => $Historiquepaiement,
            'paiements' => $paiements,
        ));
    }

    /**
     * Lists all paiement entities.
     *
     * @Route("/", name="paiement_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $paiements = $em->getRepository('AppBundle:Paiement')->findAll();

        return $this->render('@App/paiement/index.html.twig', array(
            'paiements' => $paiements,
        ));
    }

    /**
     * @Route("/recqcheInfos", name="recqcheInfos")
     */
    public function recqcheInfos(Request $request){

            $em = $this->getDoctrine()->getManager();
            $enfant = $this->getDoctrine()->getRepository(Enfant::class)->find($request->get('id'));
            $paiement = $this->getDoctrine()->getRepository(Paiement::class)->findBy(['enfant'=>$enfant]);
        $data_reponse  = [
            'first'=>false,
            'ASSURANCE'=>false,
            'INSCRIPTION'=>false,
        ];
            //verification
        if (count($paiement) == 0 ){
            return $this->json(array("success"=>true,
                'reponse'=>[
                    'first'=>true,
                    'ASSURANCE'=>false,
                    'INSCRIPTION'=>false,
                ]));
        }else{
            foreach ($paiement as $key=> $value){
                if ($value->getType() == "ASSURANCE")
                    $data_reponse['ASSURANCE']  = true;
                if ($value->getType() == "INSCRIPTION")
                    $data_reponse['INSCRIPTION']  = true;
            }
        }




        return $this->json(array("success"=>true,
            'reponse'=>$data_reponse,'enfantInfo'=>$enfant));

    }


    /**
     * @Route("/saveHistorique", name="saveHistorique")
     */
    public function saveHistorique(Request $request){

        $em = $this->getDoctrine()->getManager();
        $paiement = $this->getDoctrine()->getRepository(Paiement::class)->find($request->get('paiement'));
        $histlast = $this->getDoctrine()->getRepository(Historiquepaiement::class)->findBy([
           'paiement'=>$paiement
        ]);
        if ($histlast[count($histlast)-1]->getRest() < $request->get('montarégler')){
            $request->getSession()->getFlashBag()->add('notice', ['message'=>'Le montant saisi est supérieur au montant due.','type'=>'erreur','title'=>'Erreur']);

            return $this->redirectToRoute('reglement', array('id' => $paiement->getId()));

        }
$paiement->setRestapayer($histlast[count($histlast)-1]->getRest() - $request->get('montarégler'));
$paiement->setMontantregler($paiement->getSommeapayer() - ($histlast[count($histlast)-1]->getRest() - $request->get('montarégler')));
        $historique  = new Historiquepaiement();
        $historique->setDatepaiement(new \DateTime($request->get('datereglement')));
        $historique->setDatefin(new \DateTime($request->get('datefin')));
        $historique->setDatedebut(new \DateTime($request->get('datedebut')));
        $historique->setRest($histlast[count($histlast)-1]->getRest() - $request->get('montarégler'));
        $historique->setMontanregler($request->get('montarégler'));
        $historique->setPaiement($paiement);
       $em->persist($historique);
       $em->flush();
        $request->getSession()->getFlashBag()->add('notice', ['message'=>'LOpération éfetuer avec succès','type'=>'success','title'=>'Succès']);
        return $this->redirectToRoute('reglement', array('id' => $paiement->getId()));
    }




    /**
     * @Route("/recqchePeriodAssurance", name="recqchePeriodAssurance")
     */
    public function recqchePeriodAssurance(Request $request){

            $em = $this->getDoctrine()->getManager();
            $enfant = $this->getDoctrine()->getRepository(Enfant::class)->find($request->get('id'));
        //on verifie si l'enfant a deja un assurance
        $VerifEnfantAssurace = $em->getRepository(Assurance::class)->findBy([
            'enfant'=>$em->getRepository(Enfant::class)->find($enfant)
        ]);
        if (count($VerifEnfantAssurace) == 0){
            //sinon c'est date inscription +11 mois
            $FicheInscription = $em->getRepository(FicheInscription::class)->findBy([
                'enfant'=>$em->getRepository(Enfant::class)->find($enfant)
            ]);
            //$periode = $FicheInscription->getPeriode();
            $datestart = $FicheInscription[0]->getDateinscription();
            $datedebut = $datestart->format('Y-m-d');
            $datefin = $datestart->add(new \DateInterval('P0Y11M0DT0H0M0S'));
            $datefin = $datestart->format('Y-m-d');
        }else{
            //si ouui dernier datefin + 11 mois
            $datestart = $VerifEnfantAssurace[count($VerifEnfantAssurace)-1]->getDatefin();
            $datedebut = $datestart->format('Y-m-d');
            $datefin = $datestart->add(new \DateInterval('P0Y11M0DT0H0M0S'));
            $datefin = $datestart->format('Y-m-d');
            /*  dump(new \DateTime($datedebut));
              dump($datefin);
              die();*/

        }

        return $this->json(array("success"=>true,
            'datedebut'=>$datedebut,'datefin'=>$datefin));

    }

    /**
     * @Route("/recqchePeriodScolarite", name="recqchePeriodScolarite")
     */
    public function recqchePeriodScolarite(Request $request){

            $em = $this->getDoctrine()->getManager();
            $enfant = $this->getDoctrine()->getRepository(Enfant::class)->find($request->get('id'));
        //on verifie si l'enfant a deja un assurance
        $VerifEnfantAssurace = $em->getRepository(Paiement::class)->findBy([
            'enfant'=>$em->getRepository(Enfant::class)->find($enfant),
            'type'=>Paiement::SCOLARITE
        ]);
        if (count($VerifEnfantAssurace) == 0){
            //sinon c'est date inscription +11 mois
            $FicheInscription = $em->getRepository(FicheInscription::class)->findBy([
                'enfant'=>$em->getRepository(Enfant::class)->find($enfant)
            ]);
            //$periode = $FicheInscription->getPeriode();
            $datestart = $FicheInscription[0]->getDateinscription();
            $datedebut = $datestart->format('Y-m-d');
            $datefin = $datestart->add(new \DateInterval('P0Y1M0DT0H0M0S'));
            $datefin = $datestart->format('Y-m-d');
        }else{
            //si ouui dernier datefin + 11 mois
            $datestart = $VerifEnfantAssurace[count($VerifEnfantAssurace)-1]->getDatefin();
            $datedebut = $datestart->format('Y-m-d');
            $datefin = $datestart->add(new \DateInterval('P0Y1M0DT0H0M0S'));
            $datefin = $datestart->format('Y-m-d');
            /*  dump(new \DateTime($datedebut));
              dump($datefin);
              die();*/

        }

        return $this->json(array("success"=>true,
            'datedebut'=>$datedebut,'datefin'=>$datefin));

    }

    /**
     * Creates a new paiement entity.
     *
     * @Route("/new", name="paiement_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $cherinfo = $this->getDoctrine()->getRepository(Creche::class)->findAll();

        $paiement = new Paiement();
        $form = $this->createForm('AppBundle\Form\PaiementType', $paiement);
        $form->handleRequest($request);



        if ($form->isSubmitted() ) {
         $data = $request->get('appbundle_paiement');

           /* $verifAssurance = $em->getRepository(Paiement::class)->findBy([
                'enfant'=>$em->getRepository(Enfant::class)->find($request->get('enfant')),
                'type'=>'ASSURANCE'
            ]);*/


            $em = $this->getDoctrine()->getManager();
            $paiement->setType($data['type']);
            $paiement->setDatepaiement(new \DateTime($request->get('datepaiement')));
            $em->persist($paiement);
            $em->flush();

            if ($data['type'] == Paiement::ASSURANCE){
                //on verifie si l'enfant a deja un assurance
                $VerifEnfantAssurace = $em->getRepository(Assurance::class)->findBy([
                    'enfant'=>$em->getRepository(Enfant::class)->find($data['enfant'])
                ]);
                $assurance  = new  Assurance();
                if (count($VerifEnfantAssurace) == 0){
                    //sinon c'est date inscription +11 mois
                    $FicheInscription = $em->getRepository(FicheInscription::class)->findBy([
                        'enfant'=>$em->getRepository(Enfant::class)->find($data['enfant'])
                    ]);
                    //$periode = $FicheInscription->getPeriode();
                    $datestart = $FicheInscription[0]->getDateinscription();
                    $datedebut = $datestart->format('Y-m-d H:i:s');
                    $datefin = $datestart->add(new \DateInterval('P0Y11M0DT0H0M0S'));
                }else{
                    //si ouui dernier datefin + 11 mois
                     $datestart = $VerifEnfantAssurace[count($VerifEnfantAssurace)-1]->getDatefin();
                     $datedebut = $datestart->format('Y-m-d H:i:s');
                    $datefin = $datestart->add(new \DateInterval('P0Y11M0DT0H0M0S'));
                  /*  dump(new \DateTime($datedebut));
                    dump($datefin);
                    die();*/
                }
                $assurance->setEnfant($em->getRepository(Enfant::class)->find($data['enfant']));
                $assurance->setPaiement($paiement);
                $assurance->setDatefin($datefin);
                $assurance->setDatedebut(new \DateTime($datedebut));
                $em->persist($assurance);
                $em->flush();
            }
            if ($data['type'] == Paiement::SCOLARITE){
                $Historiquepaiement  = new  Historiquepaiement();
                    $FicheInscription = $em->getRepository(FicheInscription::class)->findBy([
                        'enfant'=>$em->getRepository(Enfant::class)->find($data['enfant'])
                    ]);
                    //$periode = $FicheInscription->getPeriode();
                    $datestart = $FicheInscription[0]->getDateinscription();
                    $datedebut = $datestart->format('Y-m-d H:i:s');
                    $datefin = $datestart->add(new \DateInterval('P0Y1M0DT0H0M0S'));

                $Historiquepaiement->setRest($data['restapayer']);
                $Historiquepaiement->setMontanregler($data['montantregler']);
                $Historiquepaiement->setPaiement($paiement);
                $Historiquepaiement->setDatefin($datefin);
                $Historiquepaiement->setDatepaiement(new \DateTime($request->get('datepaiement')));
                $Historiquepaiement->setDatedebut(new \DateTime($datedebut));
                $em->persist($Historiquepaiement);
                $em->flush();
            }

            return $this->redirectToRoute('paiement_index', array('id' => $paiement->getId()));
        }else{

        }


        $Numeropaiement = count($this->getDoctrine()->getRepository(Paiement::class)->findAll())+1;

        return $this->render('@App/paiement/new.html.twig', array(
            'cherinfo' => $cherinfo[0],
            'Numeropaiement' => $Numeropaiement,
            'paiement' => $paiement,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a paiement entity.
     *
     * @Route("/{id}", name="paiement_show")
     * @Method("GET")
     */
    public function showAction(Paiement $paiement)
    {
        $em = $this->getDoctrine()->getManager();
        $Creche = $em->getRepository(Creche::class)->findAll();

        return $this->render('@App/paiement/show.html.twig', array(
            'paiement' => $paiement,
            'creche' => $Creche[0],
        ));
    }

    /**
     * Displays a form to edit an existing paiement entity.
     *
     * @Route("/{id}/edit", name="paiement_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Paiement $paiement)
    {
        $deleteForm = $this->createDeleteForm($paiement);
        $editForm = $this->createForm('AppBundle\Form\PaiementType', $paiement);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('paiement_edit', array('id' => $paiement->getId()));
        }

        return $this->render('@App/paiement/edit.html.twig', array(
            'paiement' => $paiement,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a paiement entity.
     *
     * @Route("/{id}", name="paiement_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Paiement $paiement)
    {
        $form = $this->createDeleteForm($paiement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($paiement);
            $em->flush();
        }

        return $this->redirectToRoute('paiement_index');
    }

    /**
     * Creates a form to delete a paiement entity.
     *
     * @param Paiement $paiement The paiement entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Paiement $paiement)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('paiement_delete', array('id' => $paiement->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
