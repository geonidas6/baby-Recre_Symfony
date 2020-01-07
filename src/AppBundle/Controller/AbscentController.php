<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Abscent;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Abscent controller.
 *
 * @Route("abscent")
 */
class AbscentController extends Controller
{
    /**
     * Lists all abscent entities.
     *
     * @Route("/", name="abscent_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $abscents = $em->getRepository('AppBundle:Abscent')->findAll();

        return $this->render('@App/abscent/index.html.twig', array(
            'abscents' => $abscents,
        ));
    }

    /**
     * Creates a new abscent entity.
     *
     * @Route("/new", name="abscent_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $abscent = new Abscent();
        $form = $this->createForm('AppBundle\Form\AbscentType', $abscent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($abscent);
            $em->flush();

            return $this->redirectToRoute('abscent_show', array('id' => $abscent->getId()));
        }

        return $this->render('@App/abscent/new.html.twig', array(
            'abscent' => $abscent,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a abscent entity.
     *
     * @Route("/{id}", name="abscent_show")
     * @Method("GET")
     */
    public function showAction(Abscent $abscent)
    {
        $deleteForm = $this->createDeleteForm($abscent);

        return $this->render('@App/abscent/show.html.twig', array(
            'abscent' => $abscent,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing abscent entity.
     *
     * @Route("/{id}/edit", name="abscent_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Abscent $abscent)
    {
        $deleteForm = $this->createDeleteForm($abscent);
        $editForm = $this->createForm('AppBundle\Form\AbscentType', $abscent);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('abscent_edit', array('id' => $abscent->getId()));
        }

        return $this->render('@App/abscent/edit.html.twig', array(
            'abscent' => $abscent,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a abscent entity.
     *
     * @Route("/{id}", name="abscent_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Abscent $abscent)
    {
        $form = $this->createDeleteForm($abscent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($abscent);
            $em->flush();
        }

        return $this->redirectToRoute('abscent_index');
    }

    /**
     * Creates a form to delete a abscent entity.
     *
     * @param Abscent $abscent The abscent entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Abscent $abscent)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('abscent_delete', array('id' => $abscent->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
