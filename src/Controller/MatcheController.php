<?php

namespace App\Controller;

use App\Entity\Matche;
use App\Form\MatcheType;
use App\Form\SearchMatchType;
use App\Repository\MatcheRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MatcheController extends AbstractController
{
    #[Route('/matche', name: 'app_matche')]
    public function index(): Response
    {
        return $this->render('matche/index.html.twig', [
            'controller_name' => 'MatcheController',
        ]);
    }

    #[Route('/stadeList', name: 'matche_list')]
    public function list(Request $req, MatcheRepository $repo): Response
    {
        $list = $repo->ordredList();
        $form = $this->createForm(SearchMatchType::class);
        $form->handleRequest($req);

        if ($form->isSubmitted()) {
            $nb = $form['Date']->getData();
            $list = $repo->searchNb($nb);
        }

        return $this->render('matche/list.html.twig', [
            'list' => $list,
            'form' => $form->createView()
        ]);
    }

    #[Route('/matcheAdd', name: 'matche_add')]
    public function add(Request $req, MatcheRepository $repo): Response
    {
        $matche = new Matche();
        $form = $this->createForm(MatcheType::class, $matche);
        $form->handleRequest($req);
        if ($form->isSubmitted() && $form->isValid()) {
            $repo->save($matche, true);
            return $this->redirectToRoute('matche_list');
        }
        return $this->renderForm('matche/form.html.twig', [
            'form' => $form,
        ]);
    }
}
