<?php
/**
 * Created by PhpStorm.
 * User: vel-vet
 * Date: 02.09.18
 * Time: 17:17
 */

namespace App\Forms;

use App\Entity\Visitors;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Count;
use Symfony\Component\Validator\Constraints\Range;

class VisitorsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('numberOf',IntegerType::class,[
            'constraints'=>
                new Range([
                    'min'=>2
                    ]
                )
        ])
            ->add('place',TextType::class)
            ->add('save',SubmitType::class)
            ->getForm();
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Visitors::class
        ]);
    }
}