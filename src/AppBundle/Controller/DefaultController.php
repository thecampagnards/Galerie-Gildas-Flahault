<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function actualiteAction()
    {
        return $this->render('pages/actualite.html.twig');
    }
}
