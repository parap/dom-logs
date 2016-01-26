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
        $dr      = $this->container->get('doctrine');
        $repo    = $dr->getRepository('AppBundle:Nation');
        $nations = $repo->findAll();

        return [
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir') . '/..'),
            'nations'  => $nations
        ];
    }
}
