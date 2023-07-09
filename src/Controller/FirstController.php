<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FirstController extends AbstractController
{
    /**
<<<<<<< HEAD
     * @Route("/")
     */
    public function homepage(): Response
    {
        return new Response('It works!');
=======
     * @Route("/", name="app_homepage")
     */
    public function homepage(): Response
    {
        return $this->render('catalog/index.html.twig');
>>>>>>> master
    }

    /**
     * @Route("/contacts")
     */
    public function contacts(): Response
    {
<<<<<<< HEAD
        return new Response('Contacts');
=======
        return $this->render('catalog/contacts.html.twig');
    }

    /**
     * @Route("/about")
     */
    public function about(): Response
    {
        return $this->render('catalog/about.html.twig');
    }

    /**
     * @Route("/login")
     */
    public function login(): Response
    {
        return $this->render('catalog/login.html.twig');
    }

    /**
     * @Route("/register")
     */
    public function register(): Response
    {
        return $this->render('catalog/register.html.twig');
>>>>>>> master
    }

    /**
     * @Route("/catalog")
     */
    public function catalog(): Response
    {
<<<<<<< HEAD
        return new Response('Catalog');
=======
        return $this->render('catalog/catalog.html.twig');
>>>>>>> master
    }

    /**
     * @Route("/catalog/{slug}")
     */
    public function show($slug): Response
    {
        return $this->render('catalog/product.html.twig', [
            'page' => $slug
        ]);
<<<<<<< HEAD
//        return new Response(sprintf('Page: %s', $slug));
    }
}

=======
    }

    /**
     * @Route("/compare")
     */
    public function compare(): Response
    {
        return $this->render('catalog/compare.html.twig');
    }
}
>>>>>>> master
