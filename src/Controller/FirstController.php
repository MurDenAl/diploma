<?php

namespace App\Controller;

use App\Repository\MerchantsRepository;
use App\Repository\OffersRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategoriesRepository;

class FirstController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     */
    public function homepage(OffersRepository $offersRepository): Response
    {
        $offers = $offersRepository->findBy([], ['id' => 'ASC'], 8);
        return $this->render('catalog/index.html.twig', array('offers' => $offers));
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
        return $this->render('catalog/account.html.twig');
    }

    /**
     * @Route("/catalog")
     */
    public function catalog(OffersRepository $productsRepository, MerchantsRepository $merchantsRepository, Request $request, PaginatorInterface $paginator): Response
    {

        $merchants = $merchantsRepository->findAll();
        $products = $productsRepository->findAllQuery();

        $pagination = $paginator->paginate(
            $products, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            8 /*limit per page*/
        );
        $pagination->setTemplate('catalog/pagination.html.twig');

        return $this->render('catalog/catalog.html.twig', array('pagination' => $pagination, 'merchants' => $merchants));
    }

    /**
     * @Route("/catalog/{category}")
     */
    public function category($category, OffersRepository $offersRepository, MerchantsRepository $merchantsRepository, Request $request, PaginatorInterface $paginator, CategoriesRepository $categoriesRepository): Response
    {
        $merchants = $merchantsRepository->findAll();
        $currentCat = $categoriesRepository->findOneBy(['name' => $category])->getId();
        $subcategories = $categoriesRepository->findBy(['parent_id' => $currentCat]);
        $childCategory = NULL;
        foreach ($subcategories as $value) {
            $childCategory[] = $value->getId();
        }

        $offers = $offersRepository->findAllQuery($currentCat, $childCategory);

        $pagination = $paginator->paginate(
            $offers, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            8 /*limit per page*/
        );
        $pagination->setTemplate('catalog/pagination.html.twig');

        return $this->render('catalog/category.html.twig', array('page' => $category, 'merchants' => $merchants, 'pagination' => $pagination));
    }

    /**
     * @Route("/products/{slug}", name="app_first_show")
     */
    public function show($slug, OffersRepository $offersRepository): Response
    {
        $offer = $offersRepository->findOneBy(['id' => $slug]);
        $product = $offer->getProduct();
        $offers = $offersRepository->findBy(['product' => $product->getId()]);

        return $this->render('catalog/product.html.twig', [
            'page' => $slug,
            'product' => $product,
            'offers' => $offers,
            'offer' => $offer
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
