<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Creche;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Creche controller.
 *
 * @Route("creche")
 */
class CrecheController extends Controller
{
    /**
     * Lists all creche entities.
     *
     * @Route("/", name="creche_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $creches = $em->getRepository('AppBundle:Creche')->findAll();

        return $this->render('@App/creche/index.html.twig', array(
            'creches' => $creches[0],
        ));
    }

    /**
     * Creates a new creche entity.
     *
     * @Route("/new", name="creche_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {

        $creche = new Creche();
        $form = $this->createForm('AppBundle\Form\CrecheType', $creche);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $creche->setDateCreation(new \DateTime($request->get('dateCreation')));
            $creche->setHeureOuverture(new \DateTime($request->get('heureOuverture')));
            $creche->setHeurFermeture(new \DateTime($request->get('heurFermeture')));
            $em = $this->getDoctrine()->getManager();
            $em->persist($creche);
            $em->flush();

            return $this->redirectToRoute('creche_index', array('id' => $creche->getId()));
        }

        

       
        return $this->render('@App/creche/new.html.twig', array(
            'creche' => $creche,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a creche entity.
     *
     * @Route("/{id}", name="creche_show")
     * @Method("GET")
     */
    public function showAction(Creche $creche)
    {
        $deleteForm = $this->createDeleteForm($creche);

        return $this->render('@App/creche/show.html.twig', array(
            'creche' => $creche,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing creche entity.
     *
     * @Route("/{id}/edit", name="creche_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Creche $creche)
    {
        $deleteForm = $this->createDeleteForm($creche);
        $editForm = $this->createForm('AppBundle\Form\CrecheType', $creche);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('creche_edit', array('id' => $creche->getId()));
        }

        return $this->render('@App/creche/edit.html.twig', array(
            'creche' => $creche,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a creche entity.
     *
     * @Route("/{id}", name="creche_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Creche $creche)
    {
        $form = $this->createDeleteForm($creche);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($creche);
            $em->flush();
        }

        return $this->redirectToRoute('creche_index');
    }

    /**
     * Creates a form to delete a creche entity.
     *
     * @param Creche $creche The creche entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Creche $creche)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('creche_delete', array('id' => $creche->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
