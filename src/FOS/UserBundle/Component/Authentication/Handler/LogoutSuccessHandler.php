<?php
namespace FOS\UserBundle\Component\Authentication\Handler;
 
use Symfony\Component\Security\Http\Logout\LogoutSuccessHandlerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
 
class LogoutSuccessHandler implements LogoutSuccessHandlerInterface
{
    
    protected $router;
    protected $ServiceContainer;
    protected $security;
    
    public function __construct(SecurityContext $security, Router $router, \Symfony\Component\DependencyInjection\ContainerInterface $ContainerInterface)
    {
        $this->router = $router;
        $this->ServiceContainer = $ContainerInterface;
        $this->security = $security;
    }
    
    public function onLogoutSuccess(Request $request)
    {
    	$user = $this->security->getToken()->getUser();
    	$em = $this->ServiceContainer->get('doctrine')->getManager();
    	$user->setIsLogged(false);
    	$em->flush();
        // redirect the user to where they were before the login process begun.
        $referer_url = $request->headers->get('referer');
                    
        $response = new RedirectResponse($referer_url);        
        return $response;
    }
    
}
?>