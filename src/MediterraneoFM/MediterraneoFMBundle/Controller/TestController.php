<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace MediterraneoFM\MediterraneoFMBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\HttpFoundation\Request;
# Entities
use MediterraneoFM\MediterraneoFMBundle\Entity\OrdenPub;
# Types
use MediterraneoFM\MediterraneoFMBundle\Form\TestOrdenPubType;
use MediterraneoFM\MediterraneoFMBundle\Form\OrdenPubType;

class TestController extends Controller {
    
    /* public function testAction(Request $request) {
        $ordenpub = new OrdenPub();
        
        $emisoras = $this->getEntity('Emisoras');
        
        $tarifas = $this->getEntity('Tarifas');
        
        $costotarifas = $this->getEntity('CostoTarifas');
        
        $tarifa = array();
        foreach($emisoras as $e):
            foreach($tarifas as $t):
            if($t->getIdEmisora() == $e):
                $tarifa[$e->getNombre()] = array($t->getNombre() => $t->getNombre());
                $pautas = array();
                foreach($costotarifas as $ct):
                    if($ct->getIdTarifa() == $t):
                        $pautas[$ct->getIdCostoTarifas()] = $ct->getIdTipoMencion()->getNroMenciones() . ' menciones ' . $ct->getPeriodo() . ' de ' . $ct->getDuracion() . ' segundos por $' . $ct->getCosto();
                        $tarifa[$e->getNombre()][$t->getNombre()] = $pautas;
                    endif;
                endforeach;
            endif;
            endforeach;
        endforeach;
        
        $formType = new TestOrdenPubType($tarifa);
        $form = $this->createForm($formType, $ordenpub);
        
        if ($request->getMethod() == 'POST'):
            $form->bind($request);
            $data = $form->getData();
            
            $idtarifa = implode(',',$ordenpub->getIdTarifa());
            
            if ($form->isValid()):
                if($_POST['hidden'] == 1):
                    $em = $this->getDoctrine()->getManager();
                    $ordenpub->setIdTarifa($idtarifa);
                    $em->persist($ordenpub);
                    $em->flush();

                    #return $this->render('MediterraneoFMBundle::print.html.twig', array('datos' => $datos, 'datosclientes' => $datosclientes, 'count' => $count));
                    return $this->redirect($this->generateUrl('test'));
                
                else:
                    $formType = new TestOrdenPubType($tarifa);
                    $form = $this->createForm($formType, $ordenpub);

                    #return $this->render('MediterraneoFMBundle::print.html.twig', array('datos' => $datos, 'datosclientes' => $datosclientes, 'count' => $count));
                    return $this->render('MediterraneoFMBundle::test.html.twig', array('form' => $form->createView(), 'data' => $data,'emisoras' => $emisoras, 'tarifas' => $tarifas, 'costotarifas' => $costotarifas, 'hidden' => 1));
                endif;
          else:
              echo 'form invalid';
            endif;
        endif;
        
        return $this->render('MediterraneoFMBundle::test.html.twig', array('form' => $form->createView(), 'emisoras' => $emisoras, 'tarifas' => $tarifas, 'costotarifas' => $costotarifas, 'hidden' => 0));
    } */
   

    public function testAction() {
        $html = $this->renderView('MediterraneoFMBundle::test.html.twig');

        exec("echo '" . $html . "' | php ../vendor/dompdf/dompdf.php - -f 'bundles/ordenpub/orden123.pdf'", $re, $re2);

        var_dump($re, $re2);

        return $this->render('MediterraneoFMBundle::test.html.twig');
    }

    public function test2Action() {
        $datos = array(1 => 100, 2 => 500, 3 => 200);

        return $this->render('MediterraneoFMBundle::test.html.twig', array('datos' => $datos));
    }
}
?>
