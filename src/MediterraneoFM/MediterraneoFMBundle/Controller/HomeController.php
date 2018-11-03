<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace MediterraneoFM\MediterraneoFMBundle\Controller;

use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller {
    public function homeAction() {
        $user = $this->container->get('security.context')->getToken()->getUser();
        
        $em = $this->getDoctrine()->getManager();

        if(in_array('ROLE_ADMIN', $user->getRoles())):
            $query = $em->createQuery(
                'SELECT ot, o
                FROM MediterraneoFMBundle:OrdenTarifas ot
                JOIN ot.id_ordenpub o
                WHERE o.estado = :estado'
            )->setParameter('estado', '1');
        else:
            $query = $em->createQuery(
                'SELECT ot, o
                FROM MediterraneoFMBundle:OrdenTarifas ot
                JOIN ot.id_ordenpub o
                WHERE o.estado = :estado
                AND o.id_agencia = :id_agencia'
            )->setParameters(array(
                'estado' => '1', 
                'id_agencia' => $user->getIdAgencia()->getIdAgencia()
                ));
        endif;

        $ordenes = $query->getResult();
        
        $ordenesmesant = array();
        $ordenesdias = array();

        foreach($ordenes as $orden):
            $fecha_hasta = strtotime($orden->getFechaHasta()->format('d-m-Y'));
            $fecha_hoy = strtotime(date('d-m-Y'));

            $timestamp1 = mktime(0, 0, 0, $orden->getFechaHasta()->format('m'), $orden->getFechaHasta()->format('d'), $orden->getFechaHasta()->format('Y'));
            $timestamp2 = mktime(0, 0, 0, date('m'), date('d'), date('Y'));

            $dif_seg = $timestamp1 - $timestamp2;
            $dif_dias = $dif_seg / (60 * 60 * 24);

            if(abs($dif_dias) <= 10):
                $ordenesdias[] = $orden;
            endif;

            if($fecha_hasta < $fecha_hoy):
                $ordenesmesant[] = $orden;
            endif;
        endforeach;
        
        $id_agenc = $user->getIdAgencia()->getIdAgencia();
        
        $agencia = $this->getEntity('Agencias', false, array('id_agencia' => $id_agenc));
        
        /* if($user->getIdAgencia()->getMail()->format('d-m-Y') != date('d-m-Y')):
            $message = \Swift_Message::newInstance()
                ->setSubject("Vencimiento de ordenes de publicidad de la agencia $id_agenc.")
                ->setFrom('sistemaradiomediterraneo@gmail.com')
                ->setTo('jooaco.s@hotmail.com')
                ->setBody(
                  $this->renderView(
                    'MediterraneoFMBundle:Mails:mail.html.twig', array(
                      'ordenespub' => $ordenespub, 'ordenesmes' => $ordenesmes, 'ordenesmessig' => $ordenesmessig, 'ordenesmesant' => $ordenesmesant
                  )), 
                  'text/html'
                );
                $this->get('mailer')->send($message);

                $em = $this->getDoctrine()->getManager();
                $agencia->setMail(new \DateTime('now'));
                $em->flush();
        endif; */

        return $this->render('MediterraneoFMBundle::home.html.twig', array('ordenesdias' => $ordenesdias, 'ordenesmesant' => $ordenesmesant));
    }
    
    public function changelogAction($page) {
        return $this->render('MediterraneoFMBundle::changelog.html.twig', array('page' => $page));
    }
}
?>
