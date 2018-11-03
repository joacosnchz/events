<?php

namespace DSNEmpresas\Template\TemplateAsociacionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('TemplateAsociacionBundle:Default:index.html.twig', array('name' => $name));
    }
}
