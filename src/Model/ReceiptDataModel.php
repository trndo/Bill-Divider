<?php
/**
 * Created by PhpStorm.
 * User: vel-vet
 * Date: 12.09.18
 * Time: 13:06
 */

namespace App\Model;

use App\Entity\Receipt;

class ReceiptDataModel
{
    private $subtotal;

    private $tax;

    private $tip;

    /**
     * @return mixed
     */
    public function getSubtotal()
    {
        return $this->subtotal;
    }

    /**
     * @param mixed $subtotal
     */
    public function setSubtotal($subtotal): void
    {
        $this->subtotal = $subtotal;
    }

    /**
     * @return mixed
     */
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * @param mixed $tax
     */
    public function setTax($tax): void
    {
        $this->tax = $tax;
    }

    /**
     * @return mixed
     */
    public function getTip()
    {
        return $this->tip;
    }

    /**
     * @param mixed $tip
     */
    public function setTip($tip): void
    {
        $this->tip = $tip;
    }



}