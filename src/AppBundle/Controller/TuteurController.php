<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Tuteur;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Tuteur controller.
 *
 * @Route("tuteur")
 */
class TuteurController extends Controller
{
    /**
     * Lists all tuteur entities.
     *
     * @Route("/", name="tuteur_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tuteurs = $em->getRepository('AppBundle:Tuteur')->findAll();
        $Lienfamilliale = $em->getRepository('AppBundle:Lienfamilliale')->findtuteurEnfant();

        return $this->render('@App/tuteur/index.html.twig', array(
            'tuteurs' => $tuteurs,
            'Lienfamilliales' => $Lienfamilliale,
        ));
    }

    /**
     * Creates a new tuteur entity.
     *
     * @Route("/new", name="tuteur_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $tuteur = new Tuteur();
        $form = $this->createForm('AppBundle\Form\TuteurType', $tuteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tuteur);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', ['message'=>'Tuteur créée avec succès.','type'=>'success','title'=>'Succès']);

            return $this->redirectToRoute('enfant_new', array('id' => $tuteur->getId()));
        }

        return $this->render('@App/tuteur/new.html.twig', array(
            'tuteur' => $tuteur,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a tuteur entity.
     *
     * @Route("/{id}", name="tuteur_show")
     * @Method("GET")
     */
    public function showAction(Tuteur $tuteur)
    {
        $deleteForm = $this->createDeleteForm($tuteur);

        return $this->render('@App/tuteur/show.html.twig', array(
            'tuteur' => $tuteur,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing tuteur entity.
     *
     * @Route("/{id}/edit", name="tuteur_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Tuteur $tuteur)
    {
        $deleteForm = $this->createDeleteForm($tuteur);
        $editForm = $this->createForm('AppBundle\Form\TuteurType', $tuteur);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tuteur_edit', array('id' => $tuteur->getId()));
        }

        return $this->render('@App/tuteur/edit.html.twig', array(
            'tuteur' => $tuteur,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a tuteur entity.
     *
     * @Route("/{id}", name="tuteur_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Tuteur $tuteur)
    {
        $form = $this->createDeleteForm($tuteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tuteur);
            $em->flush();
        }

        return $this->redirectToRoute('tuteur_index');
    }

    /**
     * Creates a form to delete a tuteur entity.
     *
     * @param Tuteur $tuteur The tuteur entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Tuteur $tuteur)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tuteur_delete', array('id' => $tuteur->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
