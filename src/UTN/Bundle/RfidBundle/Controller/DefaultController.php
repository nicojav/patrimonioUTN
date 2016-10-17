<?php

namespace UTN\Bundle\RfidBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('RfidBundle:Default:index.html.twig');
    }


}
