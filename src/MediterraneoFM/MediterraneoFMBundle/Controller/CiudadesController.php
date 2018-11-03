<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace MediterraneoFM\MediterraneoFMBundle\Controller;

# Funciones kernel de symfony
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
# Entities
use MediterraneoFM\MediterraneoFMBundle\Entity\Ciudades;
# Types
use MediterraneoFM\MediterraneoFMBundle\Form\InsertCiudadesType;

class CiudadesController extends Controller {
    
    # Array que va a mostrar la busqueda incremental.
    public function getCiudadesAction() {        
        $ciudades = $this->getDoctrine()
        		->getRepository('MediterraneoFMBundle:Ciudades')
        		->findAll();
        
        foreach($ciudades as $item) {
            echo '"' . $item->getNombre() . '",';
        }
        
        return new Response('');
    }
    
    public function insertAction(Request $request) {
        # Objeto que modifico
        $ciudades = new Ciudades();
        # Formulario que modifico
        $formType = new InsertCiudadesType();
        $form = $this->createForm($formType, $ciudades);

        if ($request->getMethod() == 'POST'):
            $form->bind($request);
            #$data = $form->getData();
            $validator = $this->get('validator');
            $errors = $validator->validate($ciudades);
            
            if ($form->isValid()):
                $em = $this->getDoctrine()->getManager();
                $em->persist($ciudades);
                $em->flush();
                $this->get('session')->getFlashBag()->add(
                        'notice', 'La zona ' . $ciudades->getId() . ' ha sido agregada con éxito.'
                        );  
                
                return $this->redirect($this->generateUrl('insertCiudades'));
            else:
                return $this->render('MediterraneoFMBundle::validation.html.twig', array(
        'errors' => $errors,
    ));
            endif;
        endif;
        
        return $this->render('MediterraneoFMBundle::insertCiudades.html.twig', array('form' => $form->createView()));
    }
}




?>
