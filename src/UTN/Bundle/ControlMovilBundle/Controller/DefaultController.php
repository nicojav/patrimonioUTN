<?php

namespace UTN\Bundle\ControlMovilBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ControlMovilBundle:Default:index.html.twig');
    }

}
