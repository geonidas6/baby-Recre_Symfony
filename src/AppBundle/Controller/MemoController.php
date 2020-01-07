<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Memo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Memo controller.
 *
 * @Route("memo")
 */
class MemoController extends Controller
{
    /**
     * Lists all memo entities.
     *
     * @Route("/", name="memo_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $memos = $em->getRepository('AppBundle:Memo')->findAll();

        return $this->render('@App/memo/index.html.twig', array(
            'memos' => $memos,
        ));
    }

    /**
     * @Route("/savememo", name="savememo")
     */
    public function saveMemo(Request $request){
        $mode = $request->get('mode');
        $em = $this->getDoctrine()->getManager();
        if ($mode == 'save'){
                $memo = new Memo();
                $memo->setDateCreation(new \DateTime());
                $memo->setDescription("description");
                $memo->setEtat(true);
                $memo->setHtmlid($request->get('id'));
                $memo->setTitre("titre");
                $em->persist($memo);
                $em->flush();
        }elseif ($mode == 'update'){
            $memo = $em->getRepository('AppBundle:Memo')->findByHtmlid($request->get('id'));
            $memo = $memo[0];
                $memo->setDescription($request->get('description'));
                $memo->setEtat(true);
                $memo->setHtmlid($request->get('id'));
                $memo->setTitre($request->get('titre'));
                $em->persist($memo);
                $em->flush();
        }else{
            $memo = $em->getRepository('AppBundle:Memo')->findByHtmlid($request->get('id'));
            $memo = $memo[0];
            $em->remove($memo);
            $em->flush();
        }

            return $this->json(array("success"=>true,
                'name'=>$memo));

    }




        /**
     * Creates a new memo entity.
     *
     * @Route("/new", name="memo_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $memo = new Memo();
        $form = $this->createForm('AppBundle\Form\MemoType', $memo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($memo);
            $em->flush();

            return $this->redirectToRoute('memo_show', array('id' => $memo->getId()));
        }

        return $this->render('@App/memo/new.html.twig', array(
            'memo' => $memo,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a memo entity.
     *
     * @Route("/{id}", name="memo_show")
     * @Method("GET")
     */
    public function showAction(Memo $memo)
    {
        $deleteForm = $this->createDeleteForm($memo);

        return $this->render('@App/memo/show.html.twig', array(
            'memo' => $memo,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing memo entity.
     *
     * @Route("/{id}/edit", name="memo_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Memo $memo)
    {
        $deleteForm = $this->createDeleteForm($memo);
        $editForm = $this->createForm('AppBundle\Form\MemoType', $memo);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('memo_edit', array('id' => $memo->getId()));
        }

        return $this->render('@App/memo/edit.html.twig', array(
            'memo' => $memo,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a memo entity.
     *
     * @Route("/{id}", name="memo_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Memo $memo)
    {
        $form = $this->createDeleteForm($memo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($memo);
            $em->flush();
        }

        return $this->redirectToRoute('memo_index');
    }

    /**
     * Creates a form to delete a memo entity.
     *
     * @param Memo $memo The memo entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Memo $memo)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('memo_delete', array('id' => $memo->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
