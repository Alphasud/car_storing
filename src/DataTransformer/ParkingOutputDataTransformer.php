<?php


namespace App\DataTransformer;

use ApiPlatform\Core\DataTransformer\DataTransformerInterface;
use App\Entity\Parking;

final class ParkingOutputDataTransformer implements DataTransformerInterface
{
    /**
     * {@inheritdoc}
     */

     public function transform($data, string $to, array $context = [])
     {
         $output = new ParkingOutput();
         $output->name = $data->name;
         $parking->localisation = $data->localisation;
         return $output;
     }

     /**
     * {@inheritdoc}
     */
    public function supportsTransformation($data, string $to, array $context = []): bool
    {
       
        return ParkingOutput::class === $to && $data instanceof Parking;
    }
}