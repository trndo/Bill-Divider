<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReceiptRepository")
 */
class Receipt
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $subtotal;

    /**
     * @ORM\Column(type="float")
     */
    private $tax;

    /**
     * @ORM\Column(type="integer")
     */
    private $tip;

    /**
     * @ORM\Column(type="float")
     */
    private $total;

    /**
     * @ORM\Column(type="float")
     */
    private $equal;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Visitors", inversedBy="receipt", cascade={"persist", "remove"})
     */
    private $visitor;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSubtotal(): ?float
    {
        return $this->subtotal;
    }

    public function setSubtotal(float $subtotal): self
    {
        $this->subtotal = $subtotal;

        return $this;
    }

    public function getTax(): ?float
    {
        return $this->tax;
    }

    public function setTax(float $tax): self
    {
        $this->tax = $tax;

        return $this;
    }

    public function getTip(): ?int
    {
        return $this->tip;
    }

    public function setTip(int $tip): self
    {
        $this->tip = $tip;

        return $this;
    }

    public function getTotal(): ?float
    {
        return $this->total;
    }

    public function setTotal(float $total): self
    {
        $this->total = $total;

        return $this;
    }

    public function getEqual(): ?float
    {
        return $this->equal;
    }

    public function setEqual(float $equal): self
    {
        $this->equal = $equal;

        return $this;
    }

    public function getVisitor(): ?Visitors
    {
        return $this->visitor;
    }

    public function setVisitor(?Visitors $visitor): self
    {
        $this->visitor = $visitor;

        return $this;
    }
}
