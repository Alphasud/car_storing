<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Car;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

class CarController extends AbstractController
{
    /**
     * @Route("/car")
     */
    public function createCar() :Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $car = new Car();
        $car->setName('Alpha Romeo');
        $car->setNbSeat(4);
        $car->setColor('#000000');
        $car->setHeight(1.3);
        $car->setWidth(3.6);

        $entityManager->persist($car);

        $entityManager->flush();

        return new Response('Saved new car with id '.$car->getId());

    }
}
