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
     * @Template("AppBundle:home:base.html.twig")
     */
    public function indexAction(Request $request)
    {
        return ['base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..')];
    }
}
