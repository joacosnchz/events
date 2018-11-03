<?php

namespace DSNEmpresas\Template\TemplateBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('TemplateBundle:Default:index.html.twig', array('name' => $name));
    }
}
