<?php

namespace App\Form\Type;

use App\Entity\Car;
use App\Entity\Parking;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;


class CarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('name', TextType::class, ['label'=> 'Name of the Car : '])
        ->add('nbSeat', IntegerType::class, ['label'=> 'Number of Seats : '])
        ->add('color', ColorType::class, ['label'=> 'Color of the Car : '])
        ->add('height', IntegerType::class, ['label'=> 'Height of the Car : '])
        ->add('width', IntegerType::class, ['label'=> 'Width of the Car : '])
        
        
        
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Car::class,
        ]);
    }
}
