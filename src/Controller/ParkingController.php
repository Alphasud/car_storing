<?php

namespace App\Controller;

use App\Form\Type\ParkingType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Parking;
use App\Entity\ParkingSpace;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Dto\ParkingDto;
use App\Dto\ParkingDtoDataTransformer;
use ApiPlatform\Core\DataTransformer\DataTransformerInterface;



class ParkingController extends AbstractController
{
    /**
     * @Route("/parking", name="create_parking")
     */
    public function createParking(Request $request) : Response
    {
        
        $parkingDto = new ParkingDto();
        $parking = new Parking();
        $form = $this->createForm(ParkingType::class, $parkingDto);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $manager = $this->getDoctrine()->getManager();
            $parking->setName($parkingDto->getName());
            $parking->setLocalisation($parkingDto->getLocalisation());
            $manager->persist($parking);

            for ( $i =0; $i<$parkingDto->getNbParkingSpaces(); $i++ ) {
                $parkingSpace = new ParkingSpace();
                $parkingSpace->setParking($parking);
                $parkingSpace->setWidth($parkingDto->getWidth());
                $parkingSpace->setHeight($parkingDto->getHeight());
                $manager->persist($parkingSpace);
            }
        
            $manager->flush();
        

        $this->addFlash('success', 'Parking and Parking Spaces Created !');
        return $this->redirectToRoute('create_parking');
            
    }


        return $this->render('parking_form.html.twig', [
            'parkingForm' => $form->createView(),
            ]);

        }
    
    
}
