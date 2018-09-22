<?php
/**
 * Created by PhpStorm.
 * User: vel-vet
 * Date: 12.09.18
 * Time: 8:33
 */

namespace App\Controller;

use App\Entity\Visitors;
use App\Forms\VisitorsType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Receipt;
use App\Forms\ReceiptType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class ReceiptController extends AbstractController
{
    /**
     * @Route("/addReceipt",name="addReceipt")
     *
     */
    public function addReceipt(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(ReceiptType::class);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $data = $form->getData();

            $receipt = new Receipt($data['subtotal'], $data['tax'], $data['tip']);
            $visitor = $em->getRepository(Visitors::class)
                ->findLast();

            $receipt->setVisitor($visitor[0]);

            $total = $receipt->getTotal();
            $receipt->setEqual($total/$visitor[0]->getNumberOf());

            $em->persist($receipt);
            $em->flush();

            $response = new JsonResponse();

            $response->setData(['equal'=>$receipt->getEqual(),
                'total'=>$receipt->getTotal()]);

            return $response;


        }
        return $this->render('content/inform.html.twig',[
            'form' => $form->createView(),
        ]);
    }

}