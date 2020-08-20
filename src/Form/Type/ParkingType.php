<?php

namespace App\Form\Type;

use App\Entity\Parking;
use App\Entity\ParkingSpace;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Dto\ParkingDto;

class ParkingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('name', TextType::class, ['label'=> 'Name of the Parking : '])
        ->add('localisation', TextType::class, ['label' => 'Where is the parking located ? '])
        ->add('nbParkingSpaces', IntegerType::class, ['label'=> 'Number of Parking Spaces : '])
        ->add('height', IntegerType::class, ['label'=> 'Height of the Parking Space : '])
        ->add('width',IntegerType::class, ['label'=> 'Width of the Parking Space : '])
        
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ParkingDto::class,
        ]);
    }
}
