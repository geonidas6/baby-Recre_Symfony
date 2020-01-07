<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Lienfamilliale;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Lienfamilliale controller.
 *
 * @Route("lienfamilliale")
 */
class LienfamillialeController extends Controller
{
    /**
     * Lists all lienfamilliale entities.
     *
     * @Route("/", name="lienfamilliale_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $lienfamilliales = $em->getRepository('AppBundle:Lienfamilliale')->findAll();

        return $this->render('@App/lienfamilliale/index.html.twig', array(
            'lienfamilliales' => $lienfamilliales,
        ));
    }

    /**
     * Creates a new lienfamilliale entity.
     *
     * @Route("/new", name="lienfamilliale_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $lienfamilliale = new Lienfamilliale();
        $form = $this->createForm('AppBundle\Form\LienfamillialeType', $lienfamilliale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($lienfamilliale);
            $em->flush();

            return $this->redirectToRoute('lienfamilliale_show', array('id' => $lienfamilliale->getId()));
        }

        return $this->render('@App/lienfamilliale/new.html.twig', array(
            'lienfamilliale' => $lienfamilliale,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a lienfamilliale entity.
     *
     * @Route("/{id}", name="lienfamilliale_show")
     * @Method("GET")
     */
    public function showAction(Lienfamilliale $lienfamilliale)
    {
        $deleteForm = $this->createDeleteForm($lienfamilliale);

        return $this->render('@App/lienfamilliale/show.html.twig', array(
            'lienfamilliale' => $lienfamilliale,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing lienfamilliale entity.
     *
     * @Route("/{id}/edit", name="lienfamilliale_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Lienfamilliale $lienfamilliale)
    {
        $deleteForm = $this->createDeleteForm($lienfamilliale);
        $editForm = $this->createForm('AppBundle\Form\LienfamillialeType', $lienfamilliale);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('lienfamilliale_edit', array('id' => $lienfamilliale->getId()));
        }

        return $this->render('@App/lienfamilliale/edit.html.twig', array(
            'lienfamilliale' => $lienfamilliale,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a lienfamilliale entity.
     *
     * @Route("/{id}", name="lienfamilliale_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Lienfamilliale $lienfamilliale)
    {
        $form = $this->createDeleteForm($lienfamilliale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($lienfamilliale);
            $em->flush();
        }

        return $this->redirectToRoute('lienfamilliale_index');
    }

    /**
     * Creates a form to delete a lienfamilliale entity.
     *
     * @param Lienfamilliale $lienfamilliale The lienfamilliale entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Lienfamilliale $lienfamilliale)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('lienfamilliale_delete', array('id' => $lienfamilliale->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
