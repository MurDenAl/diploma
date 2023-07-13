<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategoriesRepository;

class FirstController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     */
    public function homepage(CategoriesRepository $doctrine): Response
    {
        //$categories = $doctrine->findByExampleField();
        //dd($categories);
        return $this->render('catalog/index.html.twig');
    }

    /**
     * @Route("/contacts")
     */
    public function contacts(): Response
    {
        return $this->render('catalog/contacts.html.twig');
    }

    /**
     * @Route("/about")
     */
    public function about(): Response
    {
        return $this->render('catalog/about.html.twig');
    }

//    /**
//     * @Route("/login")
//     */
//    public function login(): Response
//    {
//        return $this->render('catalog/login.html.twig');
//    }

    /**
     * @Route("/register")
     */
    public function register(): Response
    {
        return $this->render('catalog/register.html.twig');
    }

    /**
     * @Route("/catalog")
     */
    public function catalog(): Response
    {
        return $this->render('catalog/catalog.html.twig');
    }

    /**
     * @Route("/catalog/{slug}")
     */
    public function show($slug): Response
    {
        return $this->render('catalog/product.html.twig', [
            'page' => $slug
        ]);
    }

    /**
     * @Route("/compare")
     */
    public function compare(): Response
    {
        return $this->render('catalog/compare.html.twig');
    }

    public function menu(CategoriesRepository $doctrine)
    {
        $categories = $doctrine->findByExampleField();
        return $this->render('catalog/menu.html.twig', array('categories' => $categories));
    }
}
