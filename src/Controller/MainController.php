<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\AnnoncesRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(Request $request, AnnoncesRepository $annoncesRepository, PaginatorInterface $paginator): Response
    {

        $annonces = $annoncesRepository->findAll();

        $annonces = $paginator->paginate(
            $annonces, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            5/*limit per page*/
        );

        return $this->render('main/index.html.twig', [
            'annonces' => $annonces,
        ]);
    }
}
