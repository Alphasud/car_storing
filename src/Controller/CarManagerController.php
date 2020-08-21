<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Car;
use App\Entity\Parking;
use App\Entity\ParkingSpace;

class CarManagerController extends AbstractController
{
    /**
     * @Route("/car_manager", name="car_manager")
     */
    public function carWithoutParking()
    {
        /** @var CarRepository $carRepository */
        $cars = $this->getDoctrine()
        ->getRepository(Car::class)
        ->findByParkingNull();

        /** @var ParkingRepository $parkingRepository */
        $parkings = $this->getDoctrine()
        ->getRepository(Parking::class)
        ->findAll();


        /** @var ParkingSpaceRepository $parkingSpaceRepository */
        $parkingSpaces = $this->getDoctrine()
        ->getRepository(ParkingSpace::class)
        ->findAll();



        return $this->render('car_manager.html.twig', [
        'cars' => $cars, 
        'parkings' => $parkings,
        'parkingSpaces' => $parkingSpaces
        ]);
    }


    /** 
    * @Route("/car_manager/park", name="car_manager_park") 
    */ 
    public function park(Request $request)
    {
        
    }
    






}

 
    

