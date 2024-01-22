<?php

namespace App\Controller;

use App\Entity\Cat;
use App\Form\CatType;
use App\Repository\CatRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/cat')]
class CatController extends AbstractController
{
    #[Route('/', name: 'app_cat_index', methods: ['GET'])]
    public function index(CatRepository $catRepository): Response
    {
        return $this->render('cat/index.html.twig', [
            'cats' => $catRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_cat_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $cat = new Cat();
        $form = $this->createForm(CatType::class, $cat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($cat);
            $entityManager->flush();

            return $this->redirectToRoute('app_cat_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('cat/new.html.twig', [
            'cat' => $cat,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_cat_show', methods: ['GET'])]
    public function show(Cat $cat): Response
    {
        return $this->render('cat/show.html.twig', [
            'cat' => $cat,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_cat_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Cat $cat, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CatType::class, $cat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_cat_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('cat/edit.html.twig', [
            'cat' => $cat,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_cat_delete', methods: ['POST'])]
    public function delete(Request $request, Cat $cat, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cat->getId(), $request->request->get('_token'))) {
            $entityManager->remove($cat);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_cat_index', [], Response::HTTP_SEE_OTHER);
    }
}
