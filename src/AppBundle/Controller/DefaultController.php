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

    public function aProposAction()
    {
        return $this->render('pages/a-propos.html.twig');
    }

    public function charteDeConfidentialiteAction()
    {
        return $this->render('pages/charte-de-confidentialite.html.twig');
    }

    public function conditionsGeneralesDeVenteAction()
    {
        return $this->render('pages/conditions-generales-de-vente.html.twig');
    }

    public function LivraisonExpeditionAction()
    {
        return $this->render('pages/livraison-&-expedition.html.twig');
    }
}
