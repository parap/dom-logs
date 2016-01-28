<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Turn;
use AppBundle\Form\TurnType;

/**
 * Turn controller.
 *
 * @Route("/turn")
 */
class TurnController extends Controller
{
    /**
     * Lists all Turn entities.
     *
     * @Route("/", name="turn_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $turns = $em->getRepository('AppBundle:Turn')->findAll();

        return $this->render('turn/index.html.twig', array(
            'turns' => $turns,
        ));
    }

    /**
     * Creates a new Turn entity.
     *
     * @Route("/new", name="turn_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $turn = new Turn();
        $form = $this->createForm(new TurnType(), $turn);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($turn);
            $em->flush();

            return $this->redirectToRoute('turn_show', array('id' => $turn->getId()));
        }

        return $this->render('turn/new.html.twig', array(
            'turn' => $turn,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Turn entity.
     *
     * @Route("/{id}", name="turn_show")
     * @Method("GET")
     */
    public function showAction(Turn $turn)
    {
        $deleteForm = $this->createDeleteForm($turn);

        return $this->render('turn/show.html.twig', array(
            'turn' => $turn,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Turn entity.
     *
     * @Route("/{id}/edit", name="turn_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Turn $turn)
    {
        $deleteForm = $this->createDeleteForm($turn);
        $editForm = $this->createForm(new TurnType(), $turn);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($turn);
            $em->flush();

            return $this->redirectToRoute('turn_edit', array('id' => $turn->getId()));
        }

        return $this->render('turn/edit.html.twig', array(
            'turn' => $turn,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Turn entity.
     *
     * @Route("/{id}", name="turn_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Turn $turn)
    {
        $form = $this->createDeleteForm($turn);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($turn);
            $em->flush();
        }

        return $this->redirectToRoute('turn_index');
    }

    /**
     * Creates a form to delete a Turn entity.
     *
     * @param Turn $turn The Turn entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Turn $turn)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('turn_delete', array('id' => $turn->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
