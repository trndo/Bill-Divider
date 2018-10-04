<?php
/**
 * Created by PhpStorm.
 * User: vel-vet
 * Date: 04.10.18
 * Time: 18:56
 */

namespace App\Controller;

use App\Entity\Receipt;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ResultController extends AbstractController
{
    /**
     * @Route("/showResult",name="showResult")
     *
     */
    public function result(Request $request)
    {
        $inform = $request->query->get('id');
        $repoReceipt = $this->getDoctrine()->getRepository(Receipt::class);
        $receipts = $repoReceipt->findBy(['id'=>$inform]);

        return $this->render('content/result.html.twig',[
            'receipts' => $receipts]);
    }

}