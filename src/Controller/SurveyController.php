<?php

namespace App\Controller;

use App\Entity\Survey;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\SurveyRepository;
#[Route('/survey')]
class SurveyController extends AbstractController
{
    private EntityManagerInterface $entityManager;
    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;
    }
    #[Route('/', name: 'app_survey')]
    public function index(): Response
    {
        return $this->render('survey/index.html.twig', [
            'controller_name' => 'SurveyController',
        ]);
    }

    #[Route('/{id}', name: 'app_survey_show', methods: ['GET'])]
    public function show(Survey $survey): Response
    {
        return $this->render('survey/index.html.twig', [
            'survey' => $survey,
        ]);
    }

    #[Route('/counter/{id}', name: 'app_survey_counter')]
    public function counter($id): Response
    {
       // get the servey entity corresponding to the id
        /** @var  SurveyRepository $surveyRepository */
        $survey = $this->entityManager->getRepository(Survey::class);
        $survey = $surveyRepository->find($id);

        //verification of entity Survey is present
        if (!$survey){
            throw $this->createNotFoundException('survey not found');
        }

        //get the survey end date
        $dateEnd = $survey->getDateEnd();

        //verification if the end date is the past
        $now = new \DateTime();
        if ($now > $dateEnd){
            $timeRemaining = "sondage finit";
        } else {
            $interval = $now->diff($dateEnd);
            $timeRemaining = $interval->format('%a jours %h heures %i minutes %s secondes');

        }

        return $this->render('survey/index.html.twig', [
            'timeRemaining' => '$timeRemaining',
        ]);
    }
}
