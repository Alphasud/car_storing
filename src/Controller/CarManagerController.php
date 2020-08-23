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
    * @Route("/car_manager/park", name="park")) 
    */ 
public function parkCar(Request $request) {  
    if ($request->isXmlHttpRequest()) {
        $carId = $request->get('carId');
        $parkingId = $request->get('parkingId');
        $parkingRepository = $this->getDoctrine()->getRepository(Parking::class);
        $carRepository = $this->getDoctrine()->getRepository(Car::class);
        $parking = $parkingRepository->findOneBy([
            'id'=> $parkingId
        ]);
        $car = $carRepository->findOneBy([
            'id'=> $carId
        ]);

        $carCount = count($parking->getCars());
        $spaceCount = count($parking->getParkingSpace()); 
        
        if ( $carCount < $spaceCount ) {
            $parking->addCar($car);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($car);
            $entityManager->flush();
            $this->addFlash("success", "Car Parked Successfully !");
            
        } else {
            $this->addFlash("warning", "Sorry, Parking is full !");
            
        }
    }
}
    


 }         



 
    

