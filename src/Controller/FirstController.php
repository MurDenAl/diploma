<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FirstController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function homepage(): Response
    {
        return new Response('It works!');
    }

    /**
     * @Route("/contacts")
     */
    public function contacts(): Response
    {
        return new Response('Contacts');
    }

    /**
     * @Route("/catalog")
     */
    public function catalog(): Response
    {
        return new Response('Catalog');
    }

    /**
     * @Route("/catalog/{slug}")
     */
    public function show($slug): Response
    {
        return $this->render('catalog/product.html.twig', [
            'page' => $slug
        ]);
//        return new Response(sprintf('Page: %s', $slug));
    }
}

