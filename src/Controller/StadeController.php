<?php

namespace App\Controller;

use App\Entity\Stade;
use App\Repository\StadeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StadeController extends AbstractController
{
    #[Route('/stade', name: 'app_stade')]
    public function index(): Response
    {
        return $this->render('stade/index.html.twig', [
            'controller_name' => 'StadeController',
        ]);
    }

    #[Route('/stadeList', name: 'stade_list')]
    public function list(StadeRepository $repo): Response
    {
        return $this->render('stade/list.html.twig', [
            'list' => $repo->findAll(),
        ]);
    }

    #[Route('/stadeDelete/{id}', name: 'stade_delete')]
    public function delete(StadeRepository $repo, $id): Response
    {
        $repo->remove($repo->find($id), true);
        return $this->redirectToRoute('stade_list');
    }

    #[Route('/stadeListBy', name: 'stade_listBy')]
    public function listByStade(StadeRepository $repo): Response
    {
        return $this->render('stade/listGroup.html.twig', [
            'list' => $repo->groupBy(),
        ]);
    }
}
