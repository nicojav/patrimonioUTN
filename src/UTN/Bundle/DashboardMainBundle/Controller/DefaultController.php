<?php

namespace UTN\Bundle\DashboardMainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('UTNDashboardMainBundle:Default:index.html.twig');
    }
}
