<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Historiquepaiement;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Historiquepaiement controller.
 *
 * @Route("historiquepaiement")
 */
class HistoriquepaiementController extends Controller
{
    /**
     * Lists all historiquepaiement entities.
     *
     * @Route("/", name="historiquepaiement_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $historiquepaiements = $em->getRepository('AppBundle:Historiquepaiement')->findAll();

        return $this->render('@App/historiquepaiement/index.html.twig', array(
            'historiquepaiements' => $historiquepaiements,
        ));
    }

    /**
     * Creates a new historiquepaiement entity.
     *
     * @Route("/new", name="historiquepaiement_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $historiquepaiement = new Historiquepaiement();
        $form = $this->createForm('AppBundle\Form\HistoriquepaiementType', $historiquepaiement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($historiquepaiement);
            $em->flush();

            return $this->redirectToRoute('historiquepaiement_show', array('id' => $historiquepaiement->getId()));
        }

        return $this->render('@App/historiquepaiement/new.html.twig', array(
            'historiquepaiement' => $historiquepaiement,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a historiquepaiement entity.
     *
     * @Route("/{id}", name="historiquepaiement_show")
     * @Method("GET")
     */
    public function showAction(Historiquepaiement $historiquepaiement)
    {
        $deleteForm = $this->createDeleteForm($historiquepaiement);

        return $this->render('@App/historiquepaiement/show.html.twig', array(
            'historiquepaiement' => $historiquepaiement,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing historiquepaiement entity.
     *
     * @Route("/{id}/edit", name="historiquepaiement_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Historiquepaiement $historiquepaiement)
    {
        $deleteForm = $this->createDeleteForm($historiquepaiement);
        $editForm = $this->createForm('AppBundle\Form\HistoriquepaiementType', $historiquepaiement);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('historiquepaiement_edit', array('id' => $historiquepaiement->getId()));
        }

        return $this->render('@App/historiquepaiement/edit.html.twig', array(
            'historiquepaiement' => $historiquepaiement,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a historiquepaiement entity.
     *
     * @Route("/{id}", name="historiquepaiement_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Historiquepaiement $historiquepaiement)
    {
        $form = $this->createDeleteForm($historiquepaiement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($historiquepaiement);
            $em->flush();
        }

        return $this->redirectToRoute('historiquepaiement_index');
    }

    /**
     * Creates a form to delete a historiquepaiement entity.
     *
     * @param Historiquepaiement $historiquepaiement The historiquepaiement entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Historiquepaiement $historiquepaiement)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('historiquepaiement_delete', array('id' => $historiquepaiement->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
