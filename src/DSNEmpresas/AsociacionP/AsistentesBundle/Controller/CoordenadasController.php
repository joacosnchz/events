<?php

namespace DSNEmpresas\AsociacionP\AsistentesBundle\Controller;

# Kernel de symfony
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\HttpFoundation\Request;
# Forms
use DSNEmpresas\AsociacionP\AsistentesBundle\Form\InsertCoordenadasType;
use DSNEmpresas\AsociacionP\AsistentesBundle\Form\EditCoordenadasType;
# Entities
use DSNEmpresas\AsociacionP\AsociacionPBundle\Entity\Coordenadas;
# Paginador
use MakerLabs\PagerBundle\Pager;
use MakerLabs\PagerBundle\Adapter\ArrayAdapter;
use MakerLabs\PagerBundle\Adapter\DoctrineOrmAdapter;

class CoordenadasController extends Controller {

	public function insertAction(Request $request) {
        $em  = $this->getDoctrine()->getManager('asociacionp');
        $MetaData = $em->getClassMetadata('AsociacionPBundle:Asistentes');
        foreach($MetaData->fieldNames as $fieldName):
            $fields[$fieldName] = $fieldName;
        endforeach;
        $fields['nomApp'] = 'nomApp';
		$coordenadas = new Coordenadas;
		$formType = new InsertCoordenadasType($fields);
		$form = $this->createForm($formType, $coordenadas);

		if($request->isMethod("POST")):
			$form->bind($request);

			if($form->isValid()):
				$em->persist($coordenadas);
				$em->flush();

				$this->get('session')->getFlashBag()->add(
                    'notice', 'Las coordenadas del atributo ' . $coordenadas->getId() . ' han sido ingresadas con éxito.'
                    );
	    	else:
	    		$this->get('session')->getFlashBag()->add(
                    'error', 'No se han podido ingresar las coordenadas del atributo, porfavor verifique los datos ingresados.'
                    );
			endif;

			return $this->redirect($this->generateUrl('showCoordenadas'));
		endif;

		return $this->render('AsistentesBundle::insertCoordenadas.html.twig', array('form' => $form->createView()));
	}

	public function showOneAction($id, Request $request) {
		$id2 = explode(',', $id);
        foreach($id2 as $id2):
            # 'yes' es el valor enviado por el formulario al seleccionar todo, no nos interesa
            if($id2 != 'yes'):
                $coordenada = $this->getDoctrine()
                                ->getRepository('AsociacionPBundle:Coordenadas', 'asociacionp')
                                ->find($id2);
            endif;
        endforeach;
        $em = $this->getDoctrine()->getManager('asociacionp');
        $MetaData = $em->getClassMetadata('AsociacionPBundle:Asistentes');
        foreach($MetaData->fieldNames as $fieldName):
            $fields[$fieldName] = $fieldName;
        endforeach;
        $fields['nomApp'] = 'nomApp';
        $formType = new EditCoordenadasType($fields);
        $form = $this->createForm($formType, $coordenada);

        if($request->isMethod("POST")):
        	$form->submit($request);
        	if($form->isValid()):
		    	$em->flush();

		    	$this->get('session')->getFlashBag()->add(
                    'notice', 'Las coordenadas del atributo ' . $coordenada->getAtributo() . ' han sido editadas correctamente.'
                    );
	    	else:
	    		$this->get('session')->getFlashBag()->add(
                    'error', 'No se ha podido modificar el atributo, porfavor verifique los datos ingresados.'
                    );
        	endif;

        	return $this->redirect($this->generateUrl('showCoordenadas'));
    	endif;

    	return $this->render('AsistentesBundle::showCoordenada.html.twig', array('coordenada' => $coordenada, 'form' => $form->createView()));
	}

	public function showAction($page) {
		$coordenadas = $this->getDoctrine()
                            ->getRepository('AsociacionPBundle:Coordenadas', 'asociacionp')
                            ->findAll();

        $session = $this->get('session');

    	if(isset($_REQUEST['Coordenadas'])):
    		$session->set('Coordenadas', $_REQUEST['Coordenadas']);
		endif;

		if(!$coordenadas):
			return $this->render('TemplateAsociacionBundle::showVacio.html.twig', array('entity' => 'Coordenadas'));
		endif;

		$adapter = new ArrayAdapter($coordenadas);

        $pager = new Pager($adapter, array('page' => $page, 'limit' => $session->get('Coordenadas')));

        return $this->render('AsistentesBundle::showCoordenadas.html.twig', array('coordenadas' => $coordenadas, 'pager' => $pager));
	}

	public function deleteAction($id) {
		$id2 = explode(',', $id);
        foreach($id2 as $id2):
            # 'yes' es el valor enviado por el formulario al seleccionar todo, no nos interesa
            if($id2 != 'yes'):
                $coordenada = $this->getDoctrine()
                                ->getRepository('AsociacionPBundle:Coordenadas', 'asociacionp')
                                ->find($id2);

                $em = $this->getDoctrine()->getManager('asociacionp');
                $em->remove($coordenada);
                $em->flush();

                $this->get('session')->getFlashBag()->add(
                    'notice', 'Las coordenadas del atributo ' . $id2 . ' han sido borradas correctamente.'
                    );
            endif;
        endforeach;

        return $this->redirect($this->generateUrl('showCoordenadas'));
	}
}
?>