<?php

namespace App\Controller;

use App\Entity\Schedules;
use App\Form\SchedulesType;
use App\Repository\SchedulesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/teacher/schedules')]
class TeacherSchedulesController extends AbstractController
{
    #[Route('/', name: 'app_teacher_schedules_index', methods: ['GET'])]
    public function index(SchedulesRepository $schedulesRepository): Response
    {
        return $this->render('teacher_schedules/index.html.twig', [
            'schedules' => $schedulesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_teacher_schedules_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $schedule = new Schedules();
        $form = $this->createForm(SchedulesType::class, $schedule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($schedule);
            $entityManager->flush();

            return $this->redirectToRoute('app_teacher_schedules_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('teacher_schedules/new.html.twig', [
            'schedule' => $schedule,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_teacher_schedules_show', methods: ['GET'])]
    public function show(Schedules $schedule): Response
    {
        return $this->render('teacher_schedules/show.html.twig', [
            'schedule' => $schedule,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_teacher_schedules_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Schedules $schedule, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SchedulesType::class, $schedule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_teacher_schedules_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('teacher_schedules/edit.html.twig', [
            'schedule' => $schedule,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_teacher_schedules_delete', methods: ['POST'])]
    public function delete(Request $request, Schedules $schedule, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$schedule->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($schedule);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_teacher_schedules_index', [], Response::HTTP_SEE_OTHER);
    }
}
