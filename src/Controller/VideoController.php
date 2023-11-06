<?php

namespace App\Controller;

use App\Repository\VideoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/video')]
class VideoController extends AbstractController
{
    #[Route('/', name: 'app_video')]
    public function index(): Response
    {
        return $this->render('video/index.html.twig', [
            'controller_name' => 'VideoController',
        ]);
    }

//    #[Route('/three', name: 'app_video_three')]
//    public function topThree(VideoRepository $videoRepository) : Response{
//        $videos = $videoRepository->findTopThree();
//        dump($videos);
//        return $this->render('home/index.html.twig',[
//            'videos'=>$videos,
//        ]);
//    }

}
