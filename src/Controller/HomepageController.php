<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomepageController extends AbstractController
{
    public function index ()
    {
        return $this->render('home/index.html.twig', [
            'name' => 'test'
        ]);
    }
}