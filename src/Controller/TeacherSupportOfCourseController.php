<?php

namespace App\Controller;

use App\Entity\SupportOfCourse;
use App\Form\SupportOfCourseType;
use App\Repository\SupportOfCourseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/teacher/support/of/course')]
class TeacherSupportOfCourseController extends AbstractController
{
    #[Route('/', name: 'app_teacher_support_of_course_index', methods: ['GET'])]
    public function index(SupportOfCourseRepository $supportOfCourseRepository): Response
    {
        return $this->render('teacher_support_of_course/index.html.twig', [
            'support_of_courses' => $supportOfCourseRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_teacher_support_of_course_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $supportOfCourse = new SupportOfCourse();
        $form = $this->createForm(SupportOfCourseType::class, $supportOfCourse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($supportOfCourse);
            $entityManager->flush();

            return $this->redirectToRoute('app_teacher_support_of_course_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('teacher_support_of_course/new.html.twig', [
            'support_of_course' => $supportOfCourse,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_teacher_support_of_course_show', methods: ['GET'])]
    public function show(SupportOfCourse $supportOfCourse): Response
    {
        return $this->render('teacher_support_of_course/show.html.twig', [
            'support_of_course' => $supportOfCourse,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_teacher_support_of_course_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, SupportOfCourse $supportOfCourse, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SupportOfCourseType::class, $supportOfCourse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_teacher_support_of_course_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('teacher_support_of_course/edit.html.twig', [
            'support_of_course' => $supportOfCourse,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_teacher_support_of_course_delete', methods: ['POST'])]
    public function delete(Request $request, SupportOfCourse $supportOfCourse, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$supportOfCourse->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($supportOfCourse);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_teacher_support_of_course_index', [], Response::HTTP_SEE_OTHER);
    }
}
