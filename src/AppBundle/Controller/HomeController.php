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
            'nations'  => $repo->findAll()
        ];
    }
}
