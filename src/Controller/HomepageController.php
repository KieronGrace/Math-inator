<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


/**
 *
 */
class HomepageController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */

    public function homepage(Request $request)
    {
      //odd or even
      $oddEven = $this->createFormBuilder()
        ->add('num', NumberType::class,
            ['label' => 'Enter a number to see if it\'s odd or even!'])
        ->add('submit', SubmitType::class)
        ->getForm();

      $oddEven->handleRequest($request);

      if($oddEven->isSubmitted() && $oddEven->isValid()) {
        $data = $oddEven->getData();

        $num = $data['num'];

        if($num % 2 == 0) {
          $m = "The number {$num} is even.";
        } else {
          $m = "The number {$num} is odd.";
        }

        return $this->render('homepage.html.twig', [
          'oddEven' => $oddEven->createView(),
          'message' => $m,
        ]);
      }

      return $this->render('homepage.html.twig', [
        'oddEven' => $oddEven->createView(),
      ]);
    }

}
