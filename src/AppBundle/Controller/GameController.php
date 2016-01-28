<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Game;
use AppBundle\Form\GameType;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Game controller.
 *
 * @Route("/game")
 */
class GameController extends Controller
{
    /**
     * Creates a new Game entity.
     *
     * @Route("/new", name="game_new")
     * @Method({"GET", "POST"})
     * @Template("AppBundle:game:new.html.twig")
     */
    public function newAction(Request $request)
    {
        $game = new Game();
        $game->setUser($this->getUser());
        $form = $this->createForm(get_class(new GameType()), $game);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($game);
            $em->flush();

            return $this->redirectToRoute('game_show', array('id' => $game->getId()));
        }

        $repo = $this->container->get('doctrine')->getRepository('AppBundle:Nation');
        $nations = [$repo->findByAge(1), $repo->findByAge(2), $repo->findByAge(3)];

        return array(
            'game' => $game,
            'form' => $form->createView(),
            'nations' => $nations
        );
    }

    /**
     * Finds and displays a Game entity.
     *
     * @Route("/{id}", name="game_show")
     * @Method("GET")
     * @Template("AppBundle:game:show.html.twig")
     */
    public function showAction(Game $game)
    {
        $deleteForm = $this->createDeleteForm($game);

        return array(
            'game' => $game,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Game entity.
     *
     * @Route("/{id}/edit", name="game_edit")
     * @Method({"GET", "POST"})
     * @Template("AppBundle:game:edit.html.twig")
     */
    public function editAction(Request $request, Game $game)
    {
        $deleteForm = $this->createDeleteForm($game);
        $editForm   = $this->createForm(get_class(new GameType()), $game);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($game);
            $em->flush();

            return $this->redirectToRoute('game_edit', array('id' => $game->getId()));
        }

        return array(
            'game'        => $game,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Game entity.
     *
     * @Route("/{id}/delete", name="game_delete")
     * @Method("GET")
     * @TODO: switch to DELETE method
     */
    public function deleteAction(Request $request, Game $game)
    {
        $form = $this->createDeleteForm($game);
        $form->handleRequest($request);

        if ($game->getUser()->getId() === $this->getUser()->getId()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($game);
            $em->flush();
        }

        return $this->redirectToRoute('homepage');
    }

    /**
     * Creates a form to delete a Game entity.
     *
     * @param Game $game The Game entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Game $game)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('game_delete', array('id' => $game->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
