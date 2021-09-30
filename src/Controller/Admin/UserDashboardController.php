<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Property;
use App\Entity\Appointment;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class UserDashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Agency');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');

        yield MenuItem::section("Gestion");
        yield MenuItem::linkToCrud('Biens immobiliers', 'fas fa-home', Property::class);
        yield MenuItem::linkToCrud('Rendez-vous', 'fas fa-calendar', Appointment::class);
        
        yield MenuItem::section("Administration");
        yield MenuItem::linkToCrud('Employés', 'fas fa-user', User::class);
    }
}
