<?php

namespace DSNEmpresas\AsociacionP\AsistentesBundle\Controller;

# Kernel de symfony
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\HttpFoundation\Request;
# Forms
use DSNEmpresas\AsociacionP\AsistentesBundle\Form\InsertAsistentesType;
use DSNEmpresas\AsociacionP\AsistentesBundle\Form\EditAsistentesType;
use DSNEmpresas\AsociacionP\AsistentesBundle\Form\InsertAsistenciaType;
# Entities
use DSNEmpresas\AsociacionP\AsociacionPBundle\Entity\Asistentes;
# Paginador
use MakerLabs\PagerBundle\Pager;
use MakerLabs\PagerBundle\Adapter\ArrayAdapter;
use MakerLabs\PagerBundle\Adapter\DoctrineOrmAdapter;

class DefaultController extends Controller {

    public function insertAction($defAsistentes, Request $request) {
        $securityContext = $this->container->get('security.context');

        if(!$defAsistentes):
    	   $asistentes = new Asistentes();
        else:
            $asistentes = $defAsistentes;
            $asistentes->setAsistencia(true);
        endif;
        # En principio pensamos que el formulario no se ejecuto nunca
        $confirmation = '0'; # 0 = false
    	$formType = new InsertAsistentesType($securityContext, $confirmation, $asistencia = true);
    	$form = $this->createForm($formType, $asistentes);

    	if($request->isMethod('POST') && !$defAsistentes):
    		$form->bind($request);
            $errors = $this->getErrors($form);
            $data = $form->getData();
            $asistentes = $data;

            /* Cuando el formulario ya se confirmo (esto es true despues ser false), 
            despues de confirmar la info */
            if($form->get('confirmation')->getData() == '1'):
        		if($form->isValid()):
        			$em = $this->getDoctrine()->getManager('asociacionp');
        			$em->persist($asistentes);
        			$em->flush();

                    $asist = $this->getDoctrine()
                                ->getRepository('AsociacionPBundle:Asistentes', 'asociacionp')
                                ->findAll();
                    $cantidad = count($asist);

        			$this->get('session')->getFlashBag()->add(
    	                'notice', 'El Sr. ' . $asistentes->getApellido() . ' ' . $asistentes->getNombre() . ' ha sido inscripto de forma exitosa, y ha sido agregado a la lista de impresión de certificados. En total hay ' . $cantidad . ' inscriptos.'
    	                );
        			
                    return $this->redirect($this->generateUrl('insertAsistentes'));
                else:
                    $this->get('session')->getFlashBag()->add(
                        'error', 'Errores: ' . $errors
                        );
    			endif;
            else:
                # Si ya hemos hecho POST pero confirmation = false, lo damos true y se puede confirmar la info
                $confirmation = '1'; # 1 = true
                if($data->getAsistencia() == 1):
                    $asistenc = true;
                else:
                    $asistenc = false;
                endif;
                $formType = new InsertAsistentesType($securityContext, $confirmation, $asistenc, $data->getEnCalidad(), $data->getProfesion());
                $form = $this->createForm($formType, $asistentes);

                # Notificacion al usuario
                $this->get('session')->getFlashBag()->add(
                    'notice', 'Porfavor, confirme la información ingresada.'
                    );
            endif;
		endif;

        return $this->render('AsistentesBundle::insertAsistentes.html.twig', array('form' => $form->createView(), 'errors' => array(), 'asistentes' => $asistentes, 'confirmation' => $confirmation));
    }

    protected function getErrors($form) {
        $errors = array();

        if($form->get('fechaNac')->getErrors()):
            $errors['fechaNac'] = $form->get('fechaNac')->getErrors();
        endif;

        if($form->get('dni')->getErrors()):
            $errors['dni'] = $form->get('dni')->getErrors();
        endif;

        if($form->get('fechaGrad')->getErrors()):
            $errors['fechaGrad'] = $form->get('fechaGrad')->getErrors();
        endif;

        if($form->get('nroCalle')->getErrors()):
            $errors['nroCalle'] = $form->get('nroCalle')->getErrors();
        endif;

        if($form->get('piso')->getErrors()):
            $errors['piso'] = $form->get('piso')->getErrors();
        endif;

        if($form->get('depto')->getErrors()):
            $errors['depto'] = $form->get('depto')->getErrors();
        endif;

        if($form->get('cp')->getErrors()):
            $errors['cp'] = $form->get('cp')->getErrors();
        endif;

        /* if($form->get('captcha')->getErrors()):
            $errors['captcha'] = $form->get('captcha')->getErrors();
        endif; */

        $strErrors = '';
        foreach($errors as $key => $value):
            $strErrors .= '-' . $key . ': ' . $value[0]->getMessage() . ' ';
        endforeach;

        return $strErrors;
    }

    public function insertAsistenciaAction(Request $request) {
        $asistentes = new Asistentes();
        $formType = new InsertAsistenciaType();
        $form = $this->createForm($formType, $asistentes);

        if($request->getMethod() == 'POST'):
            $form->bind($request);
            $data = $form->getData();

            if(is_integer($data->getDni())):
                $asistente = $this->getDoctrine()
                                ->getRepository('AsociacionPBundle:Asistentes', 'asociacionp')
                                ->findOneBy(array('dni' => $data->getDni()));

                if(!$asistente):
                    $asistentes->setDni($data->getDni());
                    $asistentes->setAsistencia(true);
                    $this->get('session')->getFlashBag()->add(
                        'error', 'El DNI ingresado no estaba pre-inscripto, a continuación usted podrá realizar la inscripción.'
                        );
                    return $this->forward('AsistentesBundle:Default:insert', array('defAsistentes' => $asistentes));
                endif;

                if($data->getAsistencia() == true):
                    $asistente->setAsistencia(true);
                endif;
                $em = $this->getDoctrine()->getManager('asociacionp');
                $em->flush();

                $this->get('session')->getFlashBag()->add(
                    'notice', 'Se ha confirmado la asistencia del Sr. ' . $asistente->getApellido() . ' ' . $asistente->getNombre() . ' correctamente.'
                    );
                
                return $this->redirect($this->generateUrl('insertAsistencia'));
            else:
                $this->get('session')->getFlashBag()->add(
                    'error', 'Porfavor ingrese correctamente los datos.'
                    );
            endif;
        endif;

        return $this->render('AsistentesBundle::insertAsitencia.html.twig', array('form' => $form->createView()));
    }

    public function showOneAction($id, Request $request) {
        $id2 = explode(',', $id);
        foreach($id2 as $id2):
            # 'yes' es el valor enviado por el formulario al seleccionar todo, no nos interesa
            if($id2 != 'yes'):
                $asistente = $this->getDoctrine()
                                ->getRepository('AsociacionPBundle:Asistentes', 'asociacionp')
                                ->find($id2);

                $formType = new EditAsistentesType();
                $form = $this->createForm($formType, $asistente);

                if($request->getMethod() == 'POST'):
                    $form->bind($request);
                    if($form->isValid()):
                        $em = $this->getDoctrine()->getManager('asociacionp');
                        $em->flush();

                        $this->get('session')->getFlashBag()->add(
                            'notice', 'El asistente ' . $asistente->getApellido() . ' ' . $asistente->getNombre() . ' ha sido modificado con éxito.'
                            );

                        return $this->redirect($this->generateUrl('showAsistentes'));
                    endif;
                endif;

                return $this->render('AsistentesBundle::showAsistente.html.twig', array('form' => $form->createView(), 'asistente' => $asistente));
            endif;
        endforeach;
    }

    public function showAction($page) {
    	$asistentes = $this->getDoctrine()
    					->getRepository('AsociacionPBundle:Asistentes', 'asociacionp')
    					->findBy(array(), array('apellido' => 'ASC'));

        $presentes = 0;
        $ausentes = 0;
        foreach($asistentes as $asistente):
            if($asistente->getAsistencia() == 1):
                $presentes += 1;
            else:
                $ausentes += 1;
            endif;
        endforeach;

    	$session = $this->get('session');

    	if(isset($_REQUEST['Asistentes'])):
    		$session->set('Asistentes', $_REQUEST['Asistentes']);
		endif;

		if(!$asistentes):
			return $this->render('TemplateAsociacionBundle::showVacio.html.twig', array('entity' => 'Asistentes'));
		endif;

		$adapter = new ArrayAdapter($asistentes);

        $pager = new Pager($adapter, array('page' => $page, 'limit' => $session->get('Asistentes')));

        return $this->render('AsistentesBundle::showAsistentes.html.twig', array('asistentes' => $asistentes, 'pager' => $pager, 'presentes' => $presentes, 'ausentes' => $ausentes));
    }

    public function generateListadoPdfAction($id) {
        $user = $this->container->get('security.context')->getToken()->getUser();

        $id2 = explode(',', $id);
        if(!in_array('null', $id2)):
            foreach($id2 as $id2):
                # 'yes' es el valor enviado por el formulario al seleccionar todo, no nos interesa
                if($id2 != 'yes'):
                    $asistente = $this->getDoctrine()
                            ->getRepository('AsociacionPBundle:Asistentes', 'asociacionp')
                            ->findOneBy(array('asistencia' => true, 'id' => $id2));

                    if($asistente):
                        $asistentes[] = $asistente;
                    endif;
                endif;
            endforeach;
        else:
            $asistentes = $this->getDoctrine()
                        ->getRepository('AsociacionPBundle:Asistentes', 'asociacionp')
                        ->findBy(array('asistencia' => true));
        endif;

        $presentes = 0;
        $ausentes = 0;
        foreach($asistentes as $asistente):
            /* Conteo de presentes y ausentes */
            if($asistente->getAsistencia() == 1):
                $presentes += 1;
            else:
                $ausentes += 1;
            endif;
            /* EOF conteo */
        endforeach;

        $idAgencia = $user->getIdAgencia()->getIdAgencia();

        $code = base64_encode($idAgencia.date('d-m-Y H:i:s'));

        $web_dir = str_replace('web/', 'web', $_SERVER['DOCUMENT_ROOT']);

        $html = $this->renderView('AsistentesBundle::showAsistentesPdf.html.twig', array('asistentes' => $asistentes, 'membrete' => $user->getIdAgencia()->getPathMembrete(), 'web_dir' => $web_dir, 'presentes' => $presentes, 'ausentes' => $ausentes));

        exec("echo '" . $html . "' | php ../vendor/dompdf/dompdf.php - -p A4 -f 'bundles/asistentes/listado" . $code . ".pdf'");

        $pdf = $this->get('templating.helper.assets')
            ->getUrl("bundles/asistentes/listado$code.pdf");
        
        return $this->redirect($pdf);
    }

    public function generateCertificadosPdfAction($id) {
        $user = $this->container->get('security.context')->getToken()->getUser();

        
        $id2 = explode(',', $id);
        if(!in_array('null', $id2)):
            foreach($id2 as $id2):
                # 'yes' es el valor enviado por el formulario al seleccionar todo, no nos interesa
                if($id2 != 'yes'):
                    $asistente = $this->getDoctrine()
                            ->getRepository('AsociacionPBundle:Asistentes', 'asociacionp')
                            ->findOneBy(array('asistencia' => true, 'id' => $id2));

                    if($asistente):
                        $asistentes[] = $asistente;
                    endif;
                endif;
            endforeach;
        else:
            $asistentes = $this->getDoctrine()
                    ->getRepository('AsociacionPBundle:Asistentes', 'asociacionp')
                    ->findBy(array('asistencia' => true));
        endif;

        $em = $this->getDoctrine()->getManager('asociacionp');
        foreach($asistentes as $asistente):
            /* Conteo de cantidad de impresiones */
            $antes = $asistente->getImpreso();
            $asistente->setImpreso($antes + 1);
            $em->flush();
            /* EOF marcado */
        endforeach;

        $coordenadas = $this->getDoctrine()
                        ->getRepository('AsociacionPBundle:Coordenadas', 'asociacionp')
                        ->findAll();

        $idAgencia = $user->getIdAgencia()->getIdAgencia();

        $code = base64_encode($idAgencia.date('d-m-Y H:i:s'));

        $web_dir = str_replace('web/', 'web', $_SERVER['DOCUMENT_ROOT']);

        $html = $this->renderView('AsistentesBundle::showCertificadosPdf.html.twig', array('asistentes' => $asistentes, 'coordenadas' => $coordenadas, 'web_dir' => $web_dir));

        exec("echo '" . $html . "' | php ../vendor/dompdf/dompdf.php - -p A4 -o landscape -f 'bundles/asistentes/certificado" . $code . ".pdf'");

        $pdf = $this->get('templating.helper.assets')
            ->getUrl("bundles/asistentes/certificado$code.pdf");
        
        return $this->redirect($pdf);
    }

    public function cambiarAsistenciaAction($id) {
        $id2 = explode(',', $id);
        foreach($id2 as $id2):
            # 'yes' es el valor enviado por el formulario al seleccionar todo, no nos interesa
            if($id2 != 'yes'):
                $asistente = $this->getDoctrine()
                                ->getRepository('AsociacionPBundle:Asistentes', 'asociacionp')
                                ->find($id2);

                $em = $this->getDoctrine()->getManager('asociacionp');
                if($asistente->getAsistencia()):
                    $asistente->setAsistencia(false);
                else:
                    $asistente->setAsistencia(true);
                endif;
                $em->flush();

                $this->get('session')->getFlashBag()->add(
                    'notice', 'El asistente ' . $asistente->getApellido() . ' ' . $asistente->getNombre() . ' ha sido modificado con éxito.'
                    );
            endif;
        endforeach;

        return $this->redirect($this->generateUrl('showAsistentes'));
    }

    public function cambiarImpresionAction($id) {
        $id2 = explode(',', $id);
        foreach($id2 as $id2):
            # 'yes' es el valor enviado por el formulario al seleccionar todo, no nos interesa
            if($id2 != 'yes'):
                $asistente = $this->getDoctrine()
                                ->getRepository('AsociacionPBundle:Asistentes', 'asociacionp')
                                ->find($id2);

                $em = $this->getDoctrine()->getManager('asociacionp');
                if($asistente->getImpreso()):
                    $asistente->setImpreso(false);
                else:
                    $asistente->setImpreso(true);
                endif;
                $em->flush();

                $this->get('session')->getFlashBag()->add(
                    'notice', 'El asistente ' . $asistente->getApellido() . ' ' . $asistente->getNombre() . ' ha sido modificado con éxito.'
                    );
            endif;
        endforeach;

        return $this->redirect($this->generateUrl('showAsistentes'));
    }
}
