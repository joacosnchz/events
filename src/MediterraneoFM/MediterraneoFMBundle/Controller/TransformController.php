<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace MediterraneoFM\MediterraneoFMBundle\Controller;

# Funciones del kernel de Symfony
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class TransformController extends Controller {
    
    public function popAction() {
        $user = $this->container->get('security.context')->getToken()->getUser();
        
        $ordenes = $this->getDoctrine()
        		->getRepository('MediterraneoFMBundle:OrdenTarifas')
                        ->findAll();
        
        $ordenespub = $this->getDoctrine()
        		->getRepository('MediterraneoFMBundle:OrdenTarifas')
                        ->findBy(array('fecha_hasta' => new \DateTime("now")));
        
        $mes_actual = date('m');
        $mes_siguiente = $mes_actual + 1;
        $ordenesmes = array();
        $ordenesmessig = array();
        $ordenesmesant = array();
        
        foreach($ordenes as $orden):
            if($orden->getFechaHasta()->format('m') == $mes_actual):
                $ordenesmes[] = $orden;
            endif;
            
            if($orden->getFechaHasta()->format('m') == $mes_siguiente):
                $ordenesmessig[] = $orden;
            endif;
            
            if(strtotime($orden->getFechaHasta()->format('d-m-Y')) < strtotime(date('d-m-Y'))):

                $ordenesmesant[] = $orden;
            endif;
        endforeach;
        
        $id_agenc = $user->getIdAgencia()->getIdAgencia();
        
        $agencia = $this->getEntity('Agencias', false, array('id_agencia' => $id_agenc));
        
        if($user->getIdAgencia()->getMail()->format('d-m-Y') != date('d-m-Y')):
            $message = \Swift_Message::newInstance()
                ->setSubject("Vencimiento de ordenes de publicidad de la agencia $id_agenc.")
                ->setFrom('joaquinsanchez@dsnempresas.com.ar')
                ->setTo('jooaco.s@hotmail.com')
                ->setBody(
                  $this->renderView(
                    'MediterraneoFMBundle:PopUps:pop.html.twig', array(
                      'ordenespub' => $ordenespub, 'ordenesmes' => $ordenesmes, 'ordenesmessig' => $ordenesmessig, 'ordenesmesant' => $ordenesmesant
                  )), 
                  'text/html'
                );
                $this->get('mailer')->send($message);

                $em = $this->getDoctrine()->getManager();
                $agencia->setMail(new \DateTime('now'));
                $em->flush();
        endif;
        
        return $this->render('MediterraneoFMBundle:PopUps:pop.html.twig', array('ordenespub' => $ordenespub, 'ordenesmes' => $ordenesmes, 'ordenesmessig' => $ordenesmessig, 'ordenesmesant' => $ordenesmesant));
    }
    
    public function TransformIdToNameAction($idArray, $Entity) {
        if($idArray == null) {
            return new Response('');
        }
        else {
            $entityname = $this->getDoctrine()
                ->getRepository("MediterraneoFMBundle:$Entity")
                ->find($idArray);
        
            return new Response($entityname->getNombre());
        }
    }
    
    public function TransformIdToNameStringsAction($idsArray, $entity) {
        if($idsArray == null):
            return new Response('');
        else:
            $a = rtrim($idsArray);
            $b = explode(' ', $a);
            $array = array();
            foreach($b as $b) {
                $array[] = $this->getDoctrine()
                    ->getRepository("MediterraneoFMBundle:$entity")
                    ->find($b);
            }
        endif;
            
        $string = '';
        foreach($array as $ar) {
            $string .= $ar->getNombre() . ',';
        }

        return new Response($string);
    }    
    
    
    public function traducir($num) {
        $partes=explode('.',$num);
        $s=$partes[0];
        if (strlen($s)>12)
          die('Hasta 12 dígitos');
        $entera=$this->traduccionParcial($s);
        if (count($partes)>1)
        {
          $entera=$entera.' con '.$partes[1];
        }
        return ucfirst($entera);
    }     

    private function traduccionParcial($s) {
        settype($s,'string');    
        $faltan=strlen($s) % 3;
        $cad='';
        if ($faltan!=0)
          $faltan=3-$faltan;
        for($f=1;$f<=$faltan;$f++)
        {
          $cad.='0';
        }
        $s=$cad.$s;
        if (strlen($s)<=3 && $s[0]==0 && $s[1]==0 && $s[2]==0)
          $resu='cero';
        else
        {  
          $cad1=substr($s,strlen($s)-3,3);
          $resu=$this->convertir($cad1);
        }
        if (strlen($s)>3)
        {
          $resu2='';
          $cad2=substr($s,strlen($s)-6,3);
          if ($cad2[0]==0 && $cad2[1]==0 && $cad2[2] ==1)
        $resu2='mil ';
          else     
            if ($cad2[0]!=0 || $cad2[1]!=0 || $cad2[2] !=0)
              $resu2=$this->convertir($cad2,2).'mil ';
          $resu=$resu2.$resu;            
        }
        if (strlen($s)>6)
        {
          $resu2='';
          $cad3=substr($s,strlen($s)-9,3);
          if ($cad3[0]=='0' && $cad3[1]=='0' && $cad3[2]==1)
        $resu2='un millón ';
          else    
          if ($cad3[0]!=0 || $cad3[1]!=0 || $cad3[2] !=0)
              $resu2=$this->convertir($cad3,2).'millones ';
          $resu=$resu2.$resu;       
        }

        if (strlen($s)>9)
        {
          $resu2='';
          $cad4=substr($s,strlen($s)-12,3);

          if ($cad4[0]=='0' && $cad4[1]=='0' && $cad4[2]==1)
          {
        if ($cad3[0]==0 && $cad3[1]==0 && $cad3[2]==0)
          $resu2='mil millones ';
        else
          $resu2='mil ';
          }    
          else    
        $resu2=$this->convertir($cad4,2).'mil millones ';        
          $resu=$resu2.$resu;       
        }
        return trim($resu);
    }

    private function convertir($num,$ind=1) {
      $cad='';
      if ($num[0]==1 && $num[1]==0 && $num[2]==0)
      {
         return 'cien ';
      }
      switch ($num[0]){
               case 1:$cad.='ciento ';break;
           case 2:$cad.='doscientos ';break;
           case 3:$cad.='trescientos ';break;
           case 4:$cad.='cuatrocientos ';break;
           case 5:$cad.='quinientos ';break;
           case 6:$cad.='seiscientos ';break;
           case 7:$cad.='setecientos ';break;
           case 8:$cad.='ochocientos ';break;
           case 9:$cad.='novecientos ';break;    
      }  
      switch ($num[1]) {
          case 3:$cad.='treinta ';break;
          case 4:$cad.='cuarenta ';break;
          case 5:$cad.='cincuenta ';break;
          case 6:$cad.='sesenta ';break;
          case 7:$cad.='setenta ';break;
          case 8:$cad.='ochenta ';break;
          case 9:$cad.='noventa ';break;        
      }
      if ($num[2]>=0 && $num[1]==1)
      {
        switch ($num[1].$num[2]) {
              case 10:$cad.='diez ';break;
              case 11:$cad.='once ';break;
          case 12:$cad.='doce ';break;
          case 13:$cad.='trece ';break;
          case 14:$cad.='catorce ';break;
          case 15:$cad.='quince ';break;
          case 16:$cad.='dieciseis ';break;
          case 17:$cad.='diecisiete ';break;
          case 18:$cad.='dieciocho ';break;
          case 19:$cad.='diecinueve ';break;
        }
        return $cad;
      }
      if ($num[2]>=0 && $num[1]==2)
      {
        switch ($num[1].$num[2]) {
          case 20:$cad.='veinte ';break;  
          case 21:if ($ind==1) $cad.='veintiuno '; else $cad.='veintiun ';break;
          case 22:$cad.='veintidos ';break;
          case 23:$cad.='veintitrés ';break;
          case 24:$cad.='veinticuatro ';break;
          case 25:$cad.='veinticinco ';break;
          case 26:$cad.='veintiseis ';break;
          case 27:$cad.='veintisiete ';break;
          case 28:$cad.='veintiocho ';break;
          case 29:$cad.='veintinueve ';break;

        }
        return $cad;
      }
      if ($num[2]!=0 && $num[1]!=0)
      {
        if ($num[0]>0 || $num[1]>0)
      $cad.='y ';
      }
      if ($num[1]!=1)
      {
        switch ($num[2]) {
              case 1:if ($ind==1) $cad.='uno ';else $cad.='un ';break;
          case 2:$cad.='dos ';break;
          case 3:$cad.='tres ';break;
          case 4:$cad.='cuatro ';break;
          case 5:$cad.='cinco ';break;
          case 6:$cad.='seis ';break;
          case 7:$cad.='siete ';break;
          case 8:$cad.='ocho ';break;
          case 9:$cad.='nueve ';break;        
        }
      }      
      return $cad;  
    }
}
?>
