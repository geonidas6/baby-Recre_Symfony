<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Vaccin;
use AppBundle\Entity\Vacciner;
use AppBundle\Form\EnfantType;
use Proxies\__CG__\AppBundle\Entity\Enfant;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Vacciner controller.
 *
 * @Route("vacciner")
 */
class VaccinerController extends Controller
{
    /**
     * Lists all vacciner entities.
     *
     * @Route("/", name="vacciner_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $vacciners = $em->getRepository('AppBundle:Vacciner')->findAll();

        return $this->render('@App/vacciner/index.html.twig', array(
            'vacciners' => $vacciners,
        ));
    }

    /**
     * Creates a new vacciner entity.
     *
     * @Route("/new", name="vacciner_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $data = $request->get('data');
        $idenfant = $request->get('enfant');
        //on supprime l'ancine valeur consernat l'enfant et on inser les nouvelles
        $oldVaccin_val =  $em->getRepository(Vacciner::class)->findBy([
            'enfant'=> $em->getRepository(Enfant::class)->find($idenfant)
        ]);
        foreach ($oldVaccin_val as $ol_vacciner){
            $em->remove($ol_vacciner);
            $em->flush();
        }

        if (null != $data){
            //processus d'inserton
            foreach ($data as $key => $values){
                $vacciner = new Vacciner();
                $vacciner->setEnfant($em->getRepository(Enfant::class)->find($idenfant));
                $vacciner->setVaccin($em->getRepository(Vaccin::class)->find($key));
                $em->persist($vacciner);
                $em->flush();
            }
            $request->getSession()->getFlashBag()->add('notice', ['message'=>"Opération d'enregistrement de vaccination éffectuer avec succèss",'type'=>'success','title'=>'Success']);
            return $this->redirectToRoute('enfant_show', array('id' => $idenfant));
        }

        $request->getSession()->getFlashBag()->add('notice', ['message'=>"Opération d'enregistrement de vaccination éffectuer avec succèss",'type'=>'success','title'=>'Success']);
        return $this->redirectToRoute('enfant_show', array('id' => $idenfant));





    }

    /**
     * Finds and displays a vacciner entity.
     *
     * @Route("/{id}", name="vacciner_show")
     * @Method("GET")
     */
    public function showAction(Vacciner $vacciner)
    {
        $deleteForm = $this->createDeleteForm($vacciner);

        return $this->render('@App/vacciner/show.html.twig', array(
            'vacciner' => $vacciner,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing vacciner entity.
     *
     * @Route("/{id}/edit", name="vacciner_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Vacciner $vacciner)
    {
        $deleteForm = $this->createDeleteForm($vacciner);
        $editForm = $this->createForm('AppBundle\Form\VaccinerType', $vacciner);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('vacciner_edit', array('id' => $vacciner->getId()));
        }

        return $this->render('@App/vacciner/edit.html.twig', array(
            'vacciner' => $vacciner,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a vacciner entity.
     *
     * @Route("/{id}", name="vacciner_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Vacciner $vacciner)
    {
        $form = $this->createDeleteForm($vacciner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($vacciner);
            $em->flush();
        }

        return $this->redirectToRoute('vacciner_index');
    }




    /**
     * Creates a form to delete a vacciner entity.
     *
     * @param Vacciner $vacciner The vacciner entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Vacciner $vacciner)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('vacciner_delete', array('id' => $vacciner->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
