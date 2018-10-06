<?php
/**
 * Created by PhpStorm.
 * User: vel-vet
 * Date: 05.10.18
 * Time: 15:53
 */

namespace App\Controller\Rest;


use App\Entity\Receipt;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class ResultController extends FOSRestController
{
    /**
     * @Rest\Get("/receipt/{receiptId}")
     */
    public function getResult($receiptId):View
    {
        $result = $this->getDoctrine()->getRepository(Receipt::class)->findBy([
            'id' => $receiptId ]);
        $json = [
            'visitorsInfo' => [
                'visitors' => $result[0]->getVisitor()->getNumberOf(),
                'place' => $result[0]->getVisitor()->getPlace()
            ],
            'receiptInfo' => [
                'subtotal' => $result[0]->getSubtotal(),
                'tax' => $result[0]->getTax().'%',
                'tip' => $result[0]->getTip().'%'
            ],
            'resultInfo' => [
                'total' => $result[0]->getTotal(),
                'equal' => $result[0]->getEqual()
                ]
        ];

        return View::create($json,Response::HTTP_OK);
    }
}