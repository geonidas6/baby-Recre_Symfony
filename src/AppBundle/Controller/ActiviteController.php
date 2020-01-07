<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Activite;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Activite controller.
 *
 * @Route("activite")
 */
class ActiviteController extends Controller
{
    /**
     * Lists all activite entities.
     *
     * @Route("/", name="activite_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $activites = $em->getRepository('AppBundle:Activite')->findAll();

        return $this->render('@App/activite/index.html.twig', array(
            'activites' => $activites,
        ));
    }


    /**
     * Creates a new activite entity.
     *
     * @Route("/saveActtivity", name="saveActtivity")
     * @Method({"GET", "POST"})
     */
    function saveActtivity(Request $request){
        $activite = new Activite();
        $datdebut = new \DateTime($request->get('datedebut'));




        $datefin = new \DateTime($request->get('datefin')) ;

        $titre = $request->get('titre');

        if (null != $titre) {
            $em = $this->getDoctrine()->getManager();
            $activite->setDatedebute($datdebut);
            $activite->setDatefin($datefin);
            $activite->setDescription($titre);
            $activite->setUser($this->getUser());
            $em->persist($activite);
            $em->flush();
            return $this->json(array("success"=>true,
                'Message'=>'Activite ajouter avec succès'));
        }

        return new Response(
            $this->json(array("success"=>false,'message'=>"Une erreur a été detecter")),
            Response::HTTP_NOT_ACCEPTABLE,
            array('content-type' => 'application/json'));
    }

    /**
     * Creates a new activite entity.
     *
     * @Route("/new", name="activite_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $allactivity = $em->getRepository(Activite::class)->findAll();


        return $this->render('@App/activite/new.html.twig', array(
            'allactivitys'=>$allactivity,
            'nbractivity'=>count($allactivity),
        ));
    }

    /**
     * Finds and displays a activite entity.
     *
     * @Route("/{id}", name="activite_show")
     * @Method("GET")
     */
    public function showAction(Activite $activite)
    {
        $deleteForm = $this->createDeleteForm($activite);

        return $this->render('@App/activite/show.html.twig', array(
            'activite' => $activite,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing activite entity.
     *
     * @Route("/{id}/edit", name="activite_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Activite $activite)
    {
        $deleteForm = $this->createDeleteForm($activite);
        $editForm = $this->createForm('AppBundle\Form\ActiviteType', $activite);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()){
            $date = explode("-", $request->get('datedebut'));

            $activite->setDatedebute(new \DateTime($date[0]));
            $activite->setDatefin(new \DateTime($date[1]));
            $this->getDoctrine()->getManager()->flush();


            return $this->redirectToRoute('activite_index', array('id' => $activite->getId()));
        }
        return $this->render('@App/activite/edit.html.twig', array(
            'activite' => $activite,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a activite entity.
     *
     * @Route("/{id}", name="activite_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Activite $activite)
    {
            $em = $this->getDoctrine()->getManager();
            $em->remove($activite);
            $em->flush();
        return $this->json(array("success"=>true,
            'Message'=>'Activite suprimer avec succès'));
    }

    /**
     * Creates a form to delete a activite entity.
     *
     * @param Activite $activite The activite entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Activite $activite)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('activite_delete', array('id' => $activite->getId())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }
}
