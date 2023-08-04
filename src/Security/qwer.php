<?php

namespace App\Security;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authenticator\AbstractLoginFormAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\CsrfTokenBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\PasswordCredentials;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;

//class LoginFormAuthenticator extends AbstractLoginFormAuthenticator
//{
//    private RouterInterface $router;
//
//    /**
//     * @param RouterInterface $router
//     */
//    public function __construct(RouterInterface $router)
//    {
//        $this->router = $router;
//    }
//
//    protected function getLoginUrl(Request $request): string
//    {
//        return $this->router->generate('app_login');
//    }
//
//    public function authenticate(Request $request): Passport
//    {
//        $password = $request->request->get('password');
//        $username = $request->request->get('email');
//        //$csrfToken = $request->request->get('_csrf_token');
//        //dd($csrfToken);
//
//        return new Passport(
//            new UserBadge($username),
//            new PasswordCredentials($password),
//        //[new CsrfTokenBadge('login', $csrfToken)]
//        );
//    }
//
//    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
//    {
//        return null;
//    }
//
//}
