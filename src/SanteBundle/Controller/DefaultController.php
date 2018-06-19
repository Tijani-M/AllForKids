<?php

namespace SanteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SanteBundle:Default:index.html.twig');
    }

    public function affichageAction()
    {

        return $this->render('SanteBundle:Default:index.html.twig', array('name' => 'nom'));
        #return new Response("Bonjour : ".$id);
    }

    public function frontAction()
    {
        return $this->render('SanteBundle:Default:santeFront.html.twig');
    }

}
