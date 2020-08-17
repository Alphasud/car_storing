<?php

namespace App\Controller;

use App\Form\Type\CarType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Car;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;


class CarController extends AbstractController
{
    /**
     * @Route("/car", name="car")
     */
    

        public function createCar(Request $request) : Response
    {
        
        $car = new Car();
        
        $form = $this->createForm(CarType::class, $car);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
        $car = $form->getData();

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($car);
        $entityManager->flush();

        return new Response(
            'Saved new car with id: '.$car->getId());
        
    }

        return $this->render('car_form.html.twig', [
            'carForm' => $form->createView(),
            ]);

    }
    


        
    }


  

