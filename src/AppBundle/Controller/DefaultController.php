<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function actualiteAction()
    {
        return $this->render('pages/actualite.html.twig');
    }

    public function parcoursAction()
    {
        return $this->render('pages/parcours.html.twig');
    }
}
