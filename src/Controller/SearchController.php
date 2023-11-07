<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Video;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

class SearchController extends AbstractController
{
    #[Route('/search', name: 'app_search')]
    public function index(Request $request,EntityManagerInterface $entityManager): Response
    {
        //recupere le terme de recherche
        $searchTerm = $request->query->get('a');
        $videos = $entityManager->getRepository(Video::class)->findByTitle($searchTerm);
        return $this->render('search/index.html.twig', [
            'videos' => $videos,
        ]);
    }

}
