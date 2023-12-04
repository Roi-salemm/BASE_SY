<?php

namespace App\Controller;

// use App\Repository\CategoriesRepository;
use App\Entity\Categories;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/categories', name: 'categories_')]
class CategoriesController extends AbstractController
{
    #[Route('/{slugName}', name: 'list')]
    public function list(Categories $category): Response
    {
        // var_dump($slugName);

        return $this->render('categories/list.html.twig', [
            'category' => $category,
            // 'slug_name' => $slugName,
            ]);


        
    }





    // #[Route('/', name: 'index')]
    // public function indexy(): Response
    // {
    //     return $this->render('products/index.html.twig', [
    //         'controller_name' => 'ProductsController',
    //     ]);
    // }






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
