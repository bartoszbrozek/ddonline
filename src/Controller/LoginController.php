<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends Controller
{
    public function loginAction(Request $request, AuthenticationUtils $authenticationUtils)
    {

        if ($authenticationUtils->getLastAuthenticationError() !== null) {
            $this->addFlash('danger', 'Invalid username/password.');
        }

        return $this->render('Login/login.html.twig', [
            'username' => $authenticationUtils->getLastUsername()
        ]);
    }

    public function logoutAction(Request $request)
    {
        $this->addFlash('success', 'Logged out successfully.');
    }
}