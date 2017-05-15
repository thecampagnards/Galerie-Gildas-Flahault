<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function actualiteAction()
    {
        $actualites = $this
              ->getDoctrine()
              ->getManager()
              ->getRepository('AppBundle:Actualite')->findAll();
        return $this->render('pages/actualite.html.twig', array('actualites' => $actualites));
    }
}
