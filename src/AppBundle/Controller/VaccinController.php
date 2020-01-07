<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Vaccin;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Vaccin controller.
 *
 * @Route("vaccin")
 */
class VaccinController extends Controller
{
    /**
     * Lists all vaccin entities.
     *
     * @Route("/", name="vaccin_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $vaccins = $em->getRepository('AppBundle:Vaccin')->findAll();

        return $this->render('@App/vaccin/index.html.twig', array(
            'vaccins' => $vaccins,
        ));
    }


    /**
     * Creates a new vaccin entity.
     *
     * @Route("/new", name="vaccin_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $vaccin = new Vaccin();
        $form = $this->createForm('AppBundle\Form\VaccinType', $vaccin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($vaccin);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', ['message'=>'Vaccin crée avec succèss','type'=>'success','title'=>'Success']);
            return $this->redirectToRoute('vaccin_index');
        }

        return $this->render('@App/vaccin/new.html.twig', array(
            'vaccin' => $vaccin,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a vaccin entity.
     *
     * @Route("/{id}", name="vaccin_show")
     * @Method("GET")
     */
    public function showAction(Vaccin $vaccin)
    {
        $deleteForm = $this->createDeleteForm($vaccin);

        return $this->render('@App/vaccin/show.html.twig', array(
            'vaccin' => $vaccin,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing vaccin entity.
     *
     * @Route("/{id}/edit", name="vaccin_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Vaccin $vaccin)
    {
        $deleteForm = $this->createDeleteForm($vaccin);
        $editForm = $this->createForm('AppBundle\Form\VaccinType', $vaccin);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('vaccin_edit', array('id' => $vaccin->getId()));
        }

        return $this->render('@App/vaccin/edit.html.twig', array(
            'vaccin' => $vaccin,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a vaccin entity.
     *
     * @Route("/{id}", name="vaccin_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Vaccin $vaccin)
    {
        $form = $this->createDeleteForm($vaccin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($vaccin);
            $em->flush();
        }

        return $this->redirectToRoute('vaccin_index');
    }

    /**
     * Creates a form to delete a vaccin entity.
     *
     * @param Vaccin $vaccin The vaccin entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Vaccin $vaccin)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('vaccin_delete', array('id' => $vaccin->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
