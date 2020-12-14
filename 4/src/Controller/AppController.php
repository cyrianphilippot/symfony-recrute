<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    /**
     * @Route("/app", name="app")
     */
    public function index()
    {
        return $this->render('app/index.html.twig', [
            'controller_name' => 'Cyrian',
        ]);
    }
    /**
     * @Route("/about", name="about")
     */
    public function about_show()
    {
        return $this->render('app/about.html.twig');
    }
}
