<?php


namespace App\DataTransformer;

use ApiPlatform\Core\DataTransformer\DataTransformerInterface;
use App\Entity\Parking;
use App\Entity\ParkingSpace;

final class ParkingDtoDataTransformer implements DataTransformerInterface
{
    /**
     * {@inheritdoc}
     */

     public function transform($data, string $to, array $context = [])
     {
         $parking = new Parking();
         $parking->SetName($data->GetName());
         $parking->SetLocalisation($data->GetLocalisation());
         for($i=0; $i<$data->getNbParkingSpaces(); $i++){
             $parkingSpace = new ParkingSpace();
             $parkingSpace->setHeight($data->getHeight());
             $parkingSpace->setWidth($data->getWidth());
             $parking->addParkingSpace($parkingSpace);
         }

         return $parking;
     }

     /**
     * {@inheritdoc}
     */
    public function supportsTransformation($data, string $to, array $context = []): bool
    {
       
        if ($data instanceof Parking) {
          return false;
        }

        return Parking::class === $to && null !== ($context['input']['class'] ?? null);
    }
}