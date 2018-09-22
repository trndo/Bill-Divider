<?php
/**
 * Created by PhpStorm.
 * User: vel-vet
 * Date: 12.09.18
 * Time: 8:39
 */

namespace App\Forms;

use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\FormView;
use App\Entity\Receipt;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Count;
use Symfony\Component\Validator\Constraints\Range;


class ReceiptType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('subtotal',NumberType::class)
            ->add('tax',IntegerType::class,[
                'constraints'=>[
                new Range([
                        'min'=>1,
                        'max'=>10
                    ]
                )]

        ])
            ->add('tip',IntegerType::class,[
                'constraints'=>[
                    new Range([
                            'min'=>1,
                            'max'=>50
                        ]
                    )]

            ])
            ->add('save',SubmitType::class)
            ->getForm();
    }


}