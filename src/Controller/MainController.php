<?php

namespace App\Controller;


use App\Repository\CategoriesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(CategoriesRepository $categoriesRepository): Response
    {
        $cat = $categoriesRepository->findBy([], ['categoryOrder' => 'asc']);

        // var_dump($cat);

        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'categories' => $cat
        ]);
    }
}





