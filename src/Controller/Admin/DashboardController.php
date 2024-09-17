<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Classes;
use App\Entity\Courses;
use App\Entity\Notifications;
use App\Entity\Schedules;
use App\Entity\SupportOfCourse;
use App\Entity\Students;
use App\Entity\Teachers;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // Rendre un template Twig pour la vue d'accueil du tableau de bord
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('MyPronote');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

        // Liens vers les CRUDs pour chaque entité
        yield MenuItem::linkToCrud('Users', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('Classes', 'fas fa-chalkboard', Classes::class);
        yield MenuItem::linkToCrud('Courses', 'fas fa-book', Courses::class);
        yield MenuItem::linkToCrud('Notifications', 'fas fa-bell', Notifications::class);
        yield MenuItem::linkToCrud('Schedules', 'fas fa-calendar', Schedules::class);
        yield MenuItem::linkToCrud('Support of Course', 'fas fa-folder-open', SupportOfCourse::class);
        yield MenuItem::linkToCrud('Students', 'fas fa-user-graduate', Students::class);
        yield MenuItem::linkToCrud('Teachers', 'fas fa-chalkboard-teacher', Teachers::class); 
    }
}
