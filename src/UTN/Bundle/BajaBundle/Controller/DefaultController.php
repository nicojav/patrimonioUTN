<?php

namespace UTN\Bundle\BajaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BajaBundle:Default:index.html.twig');
    }
}
