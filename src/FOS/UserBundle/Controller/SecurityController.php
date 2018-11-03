<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FOS\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\Security\Core\SecurityContext;
use MediterraneoFM\MediterraneoFMBundle\Entity\SecurityLog;

class SecurityController extends Controller {
    
    public function loginAction() {
        $request = $this->container->get('request');
        /* @var $request \Symfony\Component\HttpFoundation\Request */
        $session = $request->getSession();
        /* @var $session \Symfony\Component\HttpFoundation\Session */

        $anterior = $this->getDoctrine()
            ->getRepository('MediterraneoFMBundle:SecurityLog')
            ->findBy(array('ip_remota' => $_SERVER['REMOTE_ADDR']));

        if($anterior):
            $c = 0;
            foreach($anterior as $a):
                if($a->getBlock() == 1):
                    if($a->getDia()->format('d-m-Y') == date('d-m-Y')):
                        $ahora = new \DateTime((date('H:i:s')));
                        $block = $a->getHora();
                        $dif = $ahora->diff($block); # Calcula la diferencia entre el horario actual y el horario de bloqueo
                        if($dif->format('%H:%i:%s') <= date('00:05:00')):
                            die();
                        endif;
                    endif;
                endif;
                $c = $c + 1;
            endforeach;
        else:
            $c = 1;
        endif;

        $SecLog = new SecurityLog();
        $SecLog->setUserName($session->get(SecurityContext::LAST_USERNAME));

        // get the error if any (works with forward and redirect -- see below)
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $SecLog->setError(1);
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } elseif (null !== $session && $session->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $SecLog->setError(1);
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $SecLog->setError(0);
            $error = '';
        }

        if ($error):
            // TODO: this is a potential security risk (see http://trac.symfony-project.org/ticket/9523)
            $error = $error->getMessage();
        endif;

        $SecLog->setDia(new \DateTime("now"));
        $SecLog->setHora(new \DateTime("now"));
        $SecLog->setIpRemota($_SERVER['REMOTE_ADDR']);
        $SecLog->setContador($c);
        # 5 intentos antes de bloquear al usuario
        if($c >= 5):
            $SecLog->setBlock(1);
        else:
            $SecLog->setBlock(0);
        endif;
        $em = $this->getDoctrine()->getManager();
        if($SecLog->getError() == 1):
            $em->persist($SecLog);
            $em->flush();
        endif;

        // last username entered by the user
        $lastUsername = (null === $session) ? '' : $session->get(SecurityContext::LAST_USERNAME);

        $csrfToken = $this->container->get('form.csrf_provider')->generateCsrfToken('authenticate');

        $anterior = null;

        return $this->renderLogin(array(
            'last_username' => $lastUsername,
            'error'         => $error,
            'csrf_token' => $csrfToken,
        ));
    }

    /**
     * Renders the login template with the given parameters. Overwrite this function in
     * an extended controller to provide additional data for the login template.
     *
     * @param array $data
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function renderLogin(array $data)
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        if ($user != 'anon.'):
            $responsable = $this->getEntity('Responsables', false, array('id_responsable' => $user->getIdResponsable()));
            $responsable->setIsLogged(true);
            $em->flush();
        else:
            
        endif;

        $template = sprintf('TemplateAsociacionBundle::login.html.%s', $this->container->getParameter('fos_user.template.engine'));

        return $this->container->get('templating')->renderResponse($template, $data);
    }

    public function checkAction()
    {
        throw new \RuntimeException('You must configure the check path to be handled by the firewall using form_login in your security firewall configuration.');
    }

    public function logoutAction()
    {
        throw new \RuntimeException('You must activate the logout in your security firewall configuration.');
    }
}
