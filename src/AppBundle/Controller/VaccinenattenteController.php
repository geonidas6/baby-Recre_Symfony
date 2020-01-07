<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Vaccinenattente;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Vaccinenattente controller.
 *
 * @Route("vaccinenattente")
 */
class VaccinenattenteController extends Controller
{
    /**
     * Lists all vaccinenattente entities.
     *
     * @Route("/", name="vaccinenattente_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $vaccinenattentes = $em->getRepository('AppBundle:Vaccinenattente')->findAll();

        return $this->render('@App/vaccinenattente/index.html.twig', array(
            'vaccinenattentes' => $vaccinenattentes,
        ));
    }

    /**
     * Creates a new vaccinenattente entity.
     *
     * @Route("/new", name="vaccinenattente_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $vaccinenattente = new Vaccinenattente();
        $form = $this->createForm('AppBundle\Form\VaccinenattenteType', $vaccinenattente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($vaccinenattente);
            $em->flush();

            return $this->redirectToRoute('vaccinenattente_show', array('id' => $vaccinenattente->getId()));
        }

        return $this->render('@App/vaccinenattente/new.html.twig', array(
            'vaccinenattente' => $vaccinenattente,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a vaccinenattente entity.
     *
     * @Route("/{id}", name="vaccinenattente_show")
     * @Method("GET")
     */
    public function showAction(Vaccinenattente $vaccinenattente)
    {
        $deleteForm = $this->createDeleteForm($vaccinenattente);

        return $this->render('@App/vaccinenattente/show.html.twig', array(
            'vaccinenattente' => $vaccinenattente,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing vaccinenattente entity.
     *
     * @Route("/{id}/edit", name="vaccinenattente_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Vaccinenattente $vaccinenattente)
    {
        $deleteForm = $this->createDeleteForm($vaccinenattente);
        $editForm = $this->createForm('AppBundle\Form\VaccinenattenteType', $vaccinenattente);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('vaccinenattente_edit', array('id' => $vaccinenattente->getId()));
        }

        return $this->render('@App/vaccinenattente/edit.html.twig', array(
            'vaccinenattente' => $vaccinenattente,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a vaccinenattente entity.
     *
     * @Route("/{id}", name="vaccinenattente_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Vaccinenattente $vaccinenattente)
    {
        $form = $this->createDeleteForm($vaccinenattente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($vaccinenattente);
            $em->flush();
        }

        return $this->redirectToRoute('vaccinenattente_index');
    }

    /**
     * Creates a form to delete a vaccinenattente entity.
     *
     * @param Vaccinenattente $vaccinenattente The vaccinenattente entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Vaccinenattente $vaccinenattente)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('vaccinenattente_delete', array('id' => $vaccinenattente->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
