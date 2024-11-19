<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\TaskRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_dashboard')]
    public function index(TaskRepository $taskRepository, UserRepository $userRepository): Response
    {
        $user = $this->getUser();
        $totalUser = $userRepository->count();
        $totalTasks = $taskRepository->countTasks($user->getId());
        return $this->render('dashboard/index.html.twig', [
            'totalTasks' => $totalTasks,
            'totalUser' => $totalUser,
            'user' => $user
        ]);
    }
}
