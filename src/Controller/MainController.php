<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\AnnoncesRepository;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(AnnoncesRepository $annoncesRepository): Response
    {
        return $this->render('main/index.html.twig', [
            'annonces' => $annoncesRepository->findAll(),
        ]);
    }
}
