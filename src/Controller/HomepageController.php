<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @property string data
 */
class HomepageController extends AbstractController
{
    public function __construct()
    {
        $this->data = 'default';
    }

    public function index ()
    {
        return $this->render('home/index.html.twig', [
            'name' => $this->data
        ]);
    }

    public function  getData(Request $request)
    {

        $response = new Response();
        $response->setStatusCode(200);
        $response->setContent($request);
        return $response;
    }
}