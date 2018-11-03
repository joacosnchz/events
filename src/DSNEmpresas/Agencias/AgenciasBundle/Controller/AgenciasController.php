<?php

namespace DSNEmpresas\Agencias\AgenciasBundle\Controller;

# Funciones kernel de symfony
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
# Paginador
use MakerLabs\PagerBundle\Pager;
use MakerLabs\PagerBundle\Adapter\ArrayAdapter;
use MakerLabs\PagerBundle\Adapter\DoctrineOrmAdapter;
# Entities
use MediterraneoFM\MediterraneoFMBundle\Entity\Agencias;
# Types
use DSNEmpresas\Agencias\AgenciasBundle\Form\InsertAgenciasType;
use DSNEmpresas\Agencias\AgenciasBundle\Form\EditAgenciasType;

class AgenciasController extends Controller {
    
    # Alta de Agencias, insert a la tabla Agencias.
    public function insertAction() {
        $agencias = new Agencias();
        $formType = new InsertAgenciasType();
        $form = $this->createForm($formType, $agencias);
        
        return $this->render('AgenciasBundle::insertAgencias.html.twig', array('form' => $form->createView()));
    }
    
    public function insertSuccessAction(Request $request) {
        # Objeto que modifico
        $agencias = new Agencias();
        # Formulario que modifico
        $formType = new InsertAgenciasType();
        $form = $this->createForm($formType, $agencias);

        if ($request->getMethod() == 'POST'):
            $form->bind($request);
            #$data = $form->getData();
            $validator = $this->get('validator');
            $errors = $validator->validate($agencias);
            
            if ($form->isValid()):
                $agencias->upload();
                $agencias->uploadMembrete();
                $agencias->setMail(new \DateTime('now'));
                $em = $this->getDoctrine()->getManager();
                $em->persist($agencias);
                $em->flush();
                $this->get('session')->getFlashBag()->add(
                        'notice', 'La agencia ' . $agencias->getIdAgencia() . ' ha sido agregada con éxito.'
                        );
                
                return $this->redirect($this->generateUrl('showAgencias'));
            else:
                return $this->render('MediterraneoFMBundle::validation.html.twig', array(
        'errors' => $errors,
    ));
            endif;
        endif;
    }
    
    /**
     *
     * @Route("/agencias/show/{page}", defaults={"page"=1}, name="showAgencias")
     * 
     */
    public function showAction($page) {
        $user = $this->container->get('security.context')->getToken()->getUser();

        if(in_array('ROLE_SUPER_ADMIN', $user->getRoles())):
            $agencias = $this->getDoctrine()
                    ->getRepository('MediterraneoFMBundle:Agencias')
                    ->findAll();
        else:
            $agencias = $this->getDoctrine()
                    ->getRepository('MediterraneoFMBundle:Agencias')
                    ->findBy(array('id_agencia' => $user->getIdAgencia()));
        endif;
        
        $session = $this->get('session');
        
        if(isset($_REQUEST['Agencias'])):
            $session->set('Agencias', $_REQUEST['Agencias']);
        endif;
         
        if (!$agencias):
            return $this->render('TemplateBundle::showVacio.html.twig', array('entity' => 'Agencias'));
        endif;
        
        $adapter = new ArrayAdapter($agencias);

        $pager = new Pager($adapter, array('page' => $page, $session->get('Agencias')));

        return $this->render('AgenciasBundle::showAgencias.html.twig', array('agencias' => $agencias, 'pager' => $pager));
    }
    
    public function showOneAction($nombrea, Request $request) {
        $nombre = explode(',', $nombrea);
        foreach($nombre as $id):
            if($id != 'yes'):
                $agencia = $this->getDoctrine()
                    ->getRepository('MediterraneoFMBundle:Agencias')
                    ->find($id);
            endif;
        endforeach;
        
        $formType = new EditAgenciasType($agencia->getPath());
        $form = $this->createForm($formType, $agencia);
        $validator = $this->get('validator');
        $errors = $validator->validate($agencia);
         
        if ($request->getMethod() == 'POST'):
            $form->bind($request);
            $data = $form->getData();
            
            if ($form->isValid()):
                $agencia->upload();
                $em = $this->getDoctrine()->getManager();
                $em->flush();
                $this->get('session')->getFlashBag()->add(
                        'notice', 'La agencia ' . $agencia->getIdAgencia() . ' ha sido editada con éxito.'
                        );

                return $this->redirect($this->generateUrl('showAgencias'));
            else:
                return $this->render('MediterraneoFMBundle::validation.html.twig', array(
        'errors' => $errors,
    ));
            endif;
        endif;
        
        return $this->render('AgenciasBundle::showAgencia.html.twig', array('form' => $form->createView(), 'agencia' => $agencia));
    }
    
    public function deleteAction($id) {
        $id2 = explode(',', $id);
        foreach($id2 as $id2):
        	 // 'yes' valor que también envía el formulario si se seleccionan todas las ordenes.
            if($id2 != 'yes'):
                $em = $this->getDoctrine()->getManager();
                $agencias = $em->getRepository('MediterraneoFMBundle:Agencias')->find($id2);

                $em->remove($agencias);
                $em->flush();
                $this->get('session')->getFlashBag()->add(
                        'notice', 'La agencia ' . $id2 . ' ha sido borrada con éxito.'
                );
    		endif;
        endforeach;

        return $this->redirect($this->generateUrl('showAgencias'));
    }
    
    public function desactivarAction($id) {
        $id2 = explode(',', $id);
        $em = $this->getDoctrine()->getManager();
        foreach($id2 as $id2):
            // 'yes' valor que también envía el formulario si se seleccionan todas las ordenes.
            if($id2 != 'yes'):
                $agencia = $this->getEntity('Agencias', false, array('id_agencia' => $id2));
        
                if($agencia->getIsActive() == 1):
                    $agencia->setIsActive(0);
                else:
                    $agencia->setIsActive(1);
                endif;
                $em->persist($agencia);
                $em->flush();
                $this->get('session')->getFlashBag()->add(
                        'notice', 'El estado de la agencia ' . $id2 . ' ha sido cambiado con éxito.'
                );
            endif;
        endforeach;
        
        return $this->redirect($this->generateUrl('showAgencias'));
    }
}
?>