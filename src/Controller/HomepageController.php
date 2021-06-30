<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
      return $this->render('homepage.html.twig');
    }

}
