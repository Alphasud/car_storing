<?php


namespace App\DataTransformer;

use ApiPlatform\Core\DataTransformer\DataTransformerInterface;
use App\Entity\Parking;

final class ParkingInputDataTransformer implements DataTransformerInterface
{
    /**
     * {@inheritdoc}
     */

     public function transform($data, string $to, array $context = [])
     {
         $parking = new Parking();
         $parking->name = $data->name;
         $parking->localisation = $data->localisation;
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