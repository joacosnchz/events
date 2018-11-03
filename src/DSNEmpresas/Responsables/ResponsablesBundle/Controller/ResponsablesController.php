<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace DSNEmpresas\Responsables\ResponsablesBundle\Controller;

# Funciones kernel de symfony
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
# Entities
use MediterraneoFM\MediterraneoFMBundle\Entity\Responsables;
# Types
use DSNEmpresas\Responsables\ResponsablesBundle\Form\InsertResponsablesType;
use DSNEmpresas\Responsables\ResponsablesBundle\Form\EditResponsablesType;
# Paginador
use MakerLabs\PagerBundle\Pager;
use MakerLabs\PagerBundle\Adapter\ArrayAdapter;
use MakerLabs\PagerBundle\Adapter\DoctrineOrmAdapter;
# Constraints
use Symfony\Component\Form\FormError;

class ResponsablesController extends Controller {
        
    # Alta de Emisoras, insert en tabla Emisoras.
    public function insertAction() {
        $responsables = new Responsables();
        $formType = new InsertResponsablesType();
        $form = $this->createForm($formType, $responsables);
        
        return $this->render('ResponsablesBundle::insertResponsables.html.twig', array('form' => $form->createView()));
    }
    
    public function insertSuccessAction(Request $request) {
        # Objeto que modifico
        $responsables = new Responsables();
        # Formulario que modifico
        $formType = new InsertResponsablesType();
        $form = $this->createForm($formType, $responsables);

        if ($request->getMethod() == 'POST'):
            $form->bind($request);
            $data = $form->getData();
            $validator = $this->get('validator');
            $errors = $validator->validate($responsables);
            
            if ($form->isValid()):
                /* Password encoding ! */
                $factory = $this->get('security.encoder_factory');
                $encoder = $factory->getEncoder($responsables);
                $contrasena = $encoder->encodePassword($data->getPassword(), $responsables->getSalt());
                $responsables->setPassword($contrasena);
                /* End password encoding */
                $em = $this->getDoctrine()->getManager();
                $em->persist($responsables);
                $em->flush();
                $this->get('session')->getFlashBag()->add(
                        'notice', 'El responsable ' . $responsables->getIdResponsable() . ' ha sido agregado con éxito.'
                        );
                
                return $this->redirect($this->generateUrl('showResponsables'));
            else:
                return $this->render('MediterraneoFMBundle::validation.html.twig', array(
        'errors' => $errors,
    ));
            endif;
        endif;
    }
    
    /**
     *
     * @Route("/responsables/show/{page}", defaults={"page"=1}, name="showResponsables")
     * 
     */
    public function showAction($page) {
        $user = $this->container->get('security.context')->getToken()->getUser();

        if(in_array('ROLE_SUPER_ADMIN', $user->getRoles())):
            $responsables = $this->getDoctrine()
                    ->getRepository('MediterraneoFMBundle:Responsables')
                    ->findAll();
        else:
            $responsables = $this->getDoctrine()
                    ->getRepository('MediterraneoFMBundle:Responsables')
                    ->findBy(array('id_agencia' => $user->getIdAgencia()));
        endif;
        
        $session = $this->get('session');
        
        if(isset($_REQUEST['Responsables'])):
            $session->set('Responsables', $_REQUEST['Responsables']);
        endif;
         
        if (!$responsables):
            return $this->render('TemplateBundle::showVacio.html.twig', array('entity' => 'Responsables'));
        endif;
        
        $adapter = new ArrayAdapter($responsables);

        $pager = new Pager($adapter, array('page' => $page, 'limit' => $session->get('Responsables')));

        return $this->render('ResponsablesBundle::showResponsables.html.twig', array('responsables' => $responsables,'pager' => $pager));
    }
    
    public function showOneAction($nombre, Request $request) {
        $user = $this->container->get('security.context')->getToken()->getUser();

        $nombre2 = explode(',', $nombre);
        foreach($nombre2 as $id):
            if($id != 'yes'):
                $responsable = $this->getDoctrine()
                        ->getRepository('MediterraneoFMBundle:Responsables')
                        ->findOneBy(array('id_responsable' => $id));
            endif;
        endforeach;

        $old = $responsable->getPassword();
        
        $formType = new EditResponsablesType($user->getRoles());
        $form = $this->createForm($formType, $responsable);
         
        if ($request->getMethod() == 'POST'):
            $form->bind($request);
            $data = $form->getData();
            $validator = $this->get('validator');
            $errors = $validator->validate($responsable);

            $check = $_POST['mediterraneofm_mediterraneofmbundle_editresponsablestype']['oldPassword'];
            
            /* Password encoding ! */
            $factory = $this->get('security.encoder_factory');
            $encoder = $factory->getEncoder($responsable);
            $nueva = $encoder->encodePassword($check, $responsable->getSalt());

            /* Confirmacion de contraseña */
            if($nueva != $old):
                $form->get('password')->addError(new FormError('La contraseña actual es incorrecta.'));
            endif;
            
            if($form->isValid()):
                if(!empty($data->getPassword())):
                    $contrasena = $encoder->encodePassword($data->getPassword(), $responsable->getSalt());
                    $responsable->setPassword($contrasena);
                else:
                    $responsable->setPassword($old);
                endif;
                /* End password encoding */
                $em = $this->getDoctrine()->getManager();
                $em->flush();
                $this->get('session')->getFlashBag()->add(
                        'notice', 'El responsable ' . $responsable->getIdResponsable() . ' ha sido editado con éxito.'
                        );

                return $this->redirect($this->generateUrl('showResponsables'));
            else:
                return $this->render('MediterraneoFMBundle::validation.html.twig', array(
                        'errors' => $errors,
                    ));
            endif;
        endif;
        
        return $this->render('ResponsablesBundle::showResponsable.html.twig', array('form' => $form->createView(), 'responsable' => $responsable));
    }
    
    public function deleteAction($id) {
        $id2 = explode(',', $id);
        foreach($id2 as $id2):
            // 'yes' valor que también envía el formulario si se seleccionan todas las ordenes.
            if($id2 != 'yes'):
                $em = $this->getDoctrine()->getManager();
                $responsables = $em->getRepository('MediterraneoFMBundle:Responsables')->find($id2);

                $em->remove($responsables);
                $em->flush();
                $this->get('session')->getFlashBag()->add(
                        'notice', 'El responsable ' . $id2 . ' ha sido borrado con éxito.'
                        );
            endif;
        endforeach;

        return $this->redirect($this->generateUrl('showResponsables'));
    }
    
    public function desactivarAction($id) {
        $id2 = explode(',', $id);
        $em = $this->getDoctrine()->getManager();
        foreach($id2 as $id2):
            // 'yes' valor que también envía el formulario si se seleccionan todas las ordenes.
            if($id2 != 'yes'):
                $responsable = $this->getEntity('Responsables', false, array('id_responsable' => $id2));
        
                if($responsable->getIsActive() == 1):
                    $responsable->setIsActive(0);
                else:
                    $responsable->setIsActive(1);
                endif;
                $em->persist($responsable);
                $em->flush();
                $this->get('session')->getFlashBag()->add(
                        'notice', 'El estado del responsable ' . $id2 . ' ha sido cambiado con éxito.'
                );
            endif;
        endforeach;
        
        return $this->redirect($this->generateUrl('showResponsables'));
    }
}
?>
