<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HelloWorldController extends AbstractController {

        /**
         * @Route("/hello")
          */

    public function index() {

    return $this->render('helloWorld.html.twig');
}
}

