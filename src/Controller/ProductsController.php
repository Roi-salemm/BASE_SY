<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/produits', name: 'produits_')]
class ProductsController extends AbstractController
{

    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('products/index.html.twig', [
            'controller_name' => 'ProductsController',
        ]);
    }

    // A rajouter quand l'entity product serra cree 

    // #[Route('/{slug}', name: 'details')]
    // public function details(Products $products): Response
    // {
    //     return $this->render('products/index.html.twig', [
    //         'controller_name' => 'ProductsController',
    //         'product' => $products,
    //         compact($products),
    //     ]);
    // }


}
