<?php
namespace App\Controller;

use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;

class TeacherDashboardController extends AbstractDashboardController
{
    #[Route('/teacher', name: 'teacher_dashboard')]
    public function index(): Response
    {
        return $this->render('teacher/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Teacher Dashboard');
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),
            MenuItem::linkToRoute('Manage Courses', 'fas fa-book', 'app_teacher_courses_index'),
            MenuItem::linkToRoute('Manage Grades', 'fas fa-graduation-cap', 'app_teacher_notes_index'),
            MenuItem::linkToRoute('Manage Schedules', 'fas fa-calendar', 'app_teacher_schedules_index'),
            MenuItem::linkToRoute('Manage Course Supports', 'fas fa-folder-open', 'app_teacher_support_of_course_index'),
        ];
    }
}
