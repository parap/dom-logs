<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class HomeController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @Template("AppBundle:home:index.html.twig")
     */
    public function indexAction(Request $request)
    {
        $repo = $this->container->get('doctrine')->getRepository('AppBundle:Nation');

        return [
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir') . '/..'),
            'nations'  => $repo->findBy([], ['age' => 'ASC', 'name' => 'ASC'])
        ];
    }
    /**
     * @Route("/contacts", name="contacts")
     * @Template("AppBundle:home:contacts.html.twig")
     */
    public function contactsAction(Request $request)
    {
        $repo = $this->container->get('doctrine')->getRepository('AppBundle:Nation');

        return [
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir') . '/..'),
            'nations'  => $repo->findBy([], ['age' => 'ASC', 'name' => 'ASC'])
        ];
    }

    /**
     * @Route("/pretenders", name="pretenders")
     * @Template("AppBundle:home:pretender.html.twig")
     */
    public function pretenderAction(Request $request)
    {
        return [];
    }
}
