<?php
/**
 * Created by PhpStorm.
 * User: vel-vet
 * Date: 10.09.18
 * Time: 16:32
 */

namespace App\Controller;

use App\Entity\Visitors;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Forms\VisitorsType;

class VisitorsController extends AbstractController
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     * @Route("/",name="Visitors")
     *
     */
    public function addInform(Request $request)
    {
        $visitors = new Visitors();
        $form = $this->createForm(VisitorsType::class,$visitors);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $em = $this->getDoctrine()->getManager();
            $em->persist($visitors);
            $em->flush();

            return $this->redirectToRoute('addReceipt');
        }
         return $this->render('content/visitors.html.twig',['form'=>$form->createView()]);
    }

}
