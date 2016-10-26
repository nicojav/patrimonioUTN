<?php

namespace UTN\Bundle\RetirosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('RetirosBundle:Default:index.html.twig');
    }
}
