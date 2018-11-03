<?php

namespace DSNEmpresas\AsociacionP\AsociacionPBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AsociacionPBundle:Default:index.html.twig', array('name' => $name));
    }
}
