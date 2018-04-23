<?php

namespace ScolariteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        //return $this->redirectToRoute('sante_homepage');
        return $this->render('ScolariteBundle:Default:home.html.twig');
    }
}
