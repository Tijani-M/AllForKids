<?php

namespace BabySittingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BabySittingBundle:Default:home.html.twig');
    }
}
