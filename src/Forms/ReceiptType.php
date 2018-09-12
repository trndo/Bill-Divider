<?php
/**
 * Created by PhpStorm.
 * User: vel-vet
 * Date: 12.09.18
 * Time: 8:39
 */

namespace App\Forms;

use App\Entity\Receipt;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;


class ReceiptType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('subtotal',TextType::class)
            ->add('tax',TextType::class)
            ->add('tip',TextType::class)
            ->add('save',SubmitType::class)
            ->getForm();
    }
}