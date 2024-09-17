<?php
// src/Controller/HomeController.php

namespace App\Controller;

use App\Repository\StudentsRepository;
use App\Repository\TeachersRepository;
use App\Repository\CoursesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(StudentsRepository $studentsRepo, TeachersRepository $teachersRepo, CoursesRepository $coursesRepo): Response
    {
        // Récupérer les statistiques
        $totalStudents = $studentsRepo->count([]);
        $totalTeachers = $teachersRepo->count([]);
        $coursesInProgress = $coursesRepo->count(['status' => 'in_progress']); 

        
        return $this->render('index.html.twig', [
            'totalStudents' => $totalStudents,
            'totalTeachers' => $totalTeachers,
            'coursesInProgress' => $coursesInProgress,
        ]);
    }
}
