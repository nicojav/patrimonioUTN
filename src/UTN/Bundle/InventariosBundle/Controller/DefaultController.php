<?php

namespace UTN\Bundle\InventariosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('InventariosBundle:Default:index.html.twig');
    }
}
