<?php

namespace AppBundle\Controller;

use AppBundle\Entity\EnfantMateriel;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Enfantmateriel controller.
 *
 * @Route("enfantmateriel")
 */
class EnfantMaterielController extends Controller
{
    /**
     * Lists all enfantMateriel entities.
     *
     * @Route("/", name="enfantmateriel_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $enfantMateriels = $em->getRepository('AppBundle:EnfantMateriel')->findAll();

        return $this->render('@App/enfantmateriel/index.html.twig', array(
            'enfantMateriels' => $enfantMateriels,
        ));
    }

    /**
     * Creates a new enfantMateriel entity.
     *
     * @Route("/new", name="enfantmateriel_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $enfantMateriel = new Enfantmateriel();
        $form = $this->createForm('AppBundle\Form\EnfantMaterielType', $enfantMateriel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($enfantMateriel);
            $em->flush();

            return $this->redirectToRoute('enfantmateriel_show', array('id' => $enfantMateriel->getId()));
        }

        return $this->render('@App/enfantmateriel/new.html.twig', array(
            'enfantMateriel' => $enfantMateriel,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a enfantMateriel entity.
     *
     * @Route("/{id}", name="enfantmateriel_show")
     * @Method("GET")
     */
    public function showAction(EnfantMateriel $enfantMateriel)
    {
        $deleteForm = $this->createDeleteForm($enfantMateriel);

        return $this->render('@App/enfantmateriel/show.html.twig', array(
            'enfantMateriel' => $enfantMateriel,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing enfantMateriel entity.
     *
     * @Route("/{id}/edit", name="enfantmateriel_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, EnfantMateriel $enfantMateriel)
    {
        $deleteForm = $this->createDeleteForm($enfantMateriel);
        $editForm = $this->createForm('AppBundle\Form\EnfantMaterielType', $enfantMateriel);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('@App/enfantmateriel_edit', array('id' => $enfantMateriel->getId()));
        }

        return $this->render('enfantmateriel/edit.html.twig', array(
            'enfantMateriel' => $enfantMateriel,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a enfantMateriel entity.
     *
     * @Route("/{id}", name="enfantmateriel_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, EnfantMateriel $enfantMateriel)
    {
        $form = $this->createDeleteForm($enfantMateriel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($enfantMateriel);
            $em->flush();
        }

        return $this->redirectToRoute('enfantmateriel_index');
    }

    /**
     * Creates a form to delete a enfantMateriel entity.
     *
     * @param EnfantMateriel $enfantMateriel The enfantMateriel entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(EnfantMateriel $enfantMateriel)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('enfantmateriel_delete', array('id' => $enfantMateriel->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
