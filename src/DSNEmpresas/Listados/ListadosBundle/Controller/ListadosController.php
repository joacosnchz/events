<?php

namespace DSNEmpresas\Listados\ListadosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
#use DSNEmpresas\Pager\PagerBundle\Controller\Pager as Pager;
# Paginador
use MakerLabs\PagerBundle\Pager;
use MakerLabs\PagerBundle\Adapter\ArrayAdapter;
use MakerLabs\PagerBundle\Adapter\DoctrineOrmAdapter;

class ListadosController extends Controller {

    public function showListadoAction($entidad, $page) {
        $datos = $this->getDoctrine()
                ->getRepository("MediterraneoFMBundle:$entidad")
                ->findAll();
        
        $session = $this->get('session');
        
        if(isset($_REQUEST["$entidad"])):
            $session->set("$entidad", $_REQUEST["$entidad"]);
        endif;
         
        if (!$datos):
            return $this->render('TemplateBundle::showVacio.html.twig', array('entity' => "$entidad"));
        endif;        

        /* $pager = new Pager($datos, array('page' => $page, 'limit' => $session->get("$entidad")));
        $pages = $pager->generate();

        $da = $pages->getAdaptedData();
        foreach($da[$page] as $pa):
            echo $pa->getId() . '<br>';
        endforeach;
        die(); */
        
        $adapter = new ArrayAdapter($datos);

        $pager = new Pager($adapter, array('page' => $page, 'limit' => $session->get("$entidad")));

        $bundle = "$entidad".'Bundle';

        $template = 'show'."$entidad";

        #$a = array(1 => 1, 2 => 2, 3 => 3, 4 => 4);

        return $this->render("$bundle::$template.html.twig", array('datos' => $datos, 'pager' => $pager));
    }
}
