<?php
namespace Fos\UserBundle\Component\Authentication\Handler;
 
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Router;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Session\Session;
 
class LoginSuccessHandler implements AuthenticationSuccessHandlerInterface
{
    
    protected $router;
    protected $security;
    protected $ServiceContainer;
    
    public function __construct(Router $router, SecurityContext $security, \Symfony\Component\DependencyInjection\ContainerInterface $ContainerInterface)
    {
        $this->router = $router;
        $this->security = $security;
        $this->ServiceContainer = $ContainerInterface;
    }
    
    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {
        $user = $this->security->getToken()->getUser();
        /* redirect the user to where they were before the login process begun. */
        
        #$referer_url = $request->headers->get('referer');

        #die($referer_url);
                    
        #$response = new RedirectResponse($referer_url);

        if ($this->security->isGranted('ROLE_SUPER_ADMIN'))
        {
            $response = new RedirectResponse($this->router->generate('showAsistentes'));
        }
        elseif ($this->security->isGranted('ROLE_ADMIN'))
        {
            $response = new RedirectResponse($this->router->generate('showAsistentes'));
        }
        elseif ($this->security->isGranted('ROLE_USER'))
        {
            
            $response = new RedirectResponse($this->router->generate('showAsistentes'));
        }
        if($this->security->isGranted('ROLE_SUPER_ADMIN') ||
            $this->security->isGranted('ROLE_ADMIN') || 
            $this->security->isGranted('ROLE_USER')){
                if($user->getIsLogged() == 1):
                    $session = new Session;

                    $session->invalidate();

                    $response = new RedirectResponse($this->router->generate('showAsistentes'));

                    return $response;
                endif;
        }

        $ahora = new \DateTime('now');

        $em = $this->ServiceContainer->get('doctrine')->getManager();
        $responsable = $this->ServiceContainer->get('doctrine')
                ->getRepository('MediterraneoFMBundle:Responsables')
                ->findBy(array('id_responsable' => $user->getIdResponsable()));
        $user->setLoggedTime($ahora);
        #$user->setIsLogged(true);
        $em->flush();

        /* if($user->getIsLogged() == 1):
            $response = new RedirectResponse($this->router->generate('fos_user_security_logout'));
        endif; */
            
        return $response;
    }
    
}
?>