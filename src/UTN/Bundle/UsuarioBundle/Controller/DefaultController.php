<?php

namespace UTN\Bundle\UsuarioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('UTNUsuarioBundle:Default:index.html.twig');
    }
}
