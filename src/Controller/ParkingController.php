<?php

namespace App\Controller;

use App\Form\Type\ParkingType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Parking;
use App\Entity\ParkingSpace;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;


class ParkingController extends AbstractController
{
    /**
     * @Route("/parking", name="parking")
     */
    public function createParking(Request $request) : Response
    {
        
        $parking = new Parking();

        $parkingSpace = new ParkingSpace();
        $parkingSpace->setHeight(3);
        $parkingSpace->setWidth(4);
            
        

        $form = $this->createForm(ParkingType::class, $parking);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
        $parking = $form->getData();

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($parking);
        $entityManager->persist($parkingSpace);
        $entityManager->flush();

        return new Response(
            'Created new parking with id: '.$parking->getId());
        
            
    }
        

        return $this->render('parking_form.html.twig', [
            'parkingForm' => $form->createView(),
            ]);

    }
}
