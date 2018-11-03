<?php
namespace FOS\UserBundle\Component\Authentication\Handler;

use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class SessionIdleHandler
{
    protected $session;
    protected $securityContext;
    protected $router;
    protected $container;

    public function __construct(SessionInterface $session, SecurityContextInterface $securityContext, RouterInterface $router, $container)
    {
        $this->session = $session;
        $this->securityContext = $securityContext;
        $this->router = $router;
        $this->container = $container;
    }

    public function onKernelRequest(GetResponseEvent $event) {
        $lifetime = $this->container->parameters['session.lifetime'];

        $ahora = new \DateTime((date('H:i:s')));
        $hoy = new \DateTime((date('d-m-Y')));

        if($this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY') ){
            $user = $this->securityContext->getToken()->getUser();
            $em = $this->container->get('doctrine')->getManager();
            
            $loggedTime = $user->getLoggedTime();

            if(strtotime($loggedTime->format('d-m-Y')) != strtotime($hoy->format('d-m-Y'))):
                $dia = true;
            else:
                $dia = false;
            endif;

            $dif = strtotime($ahora->format('H:i:s')) - strtotime($loggedTime->format('H:i:s'));

            /* if($dif >= $lifetime || $dia):
                $responsable = $this->container->get('doctrine')
                        ->getRepository('MediterraneoFMBundle:Responsables')
                        ->findBy(array('id_responsable' => $user->getIdResponsable()));
                $user->setIsLogged(false);
                $em->flush();

                $session = new Session;

                $session->invalidate();

                $session->getFlashBag()->add(
                        'notice', 'Su sesión ha caducado, porfavor acceda nuevamente.'
                        );

                $response = new RedirectResponse($this->router->generate('homepage'));

                return $response;
            endif; */

            $user->setLoggedTime(new \DateTime('now'));
            $em->flush();
        }
    }
}
?>