<?php

namespace ImageGallery\ImageGalleryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('PetroImageGalleryBundle:Default:index.html.twig');
    }

    public function aboutAction()
    {
        return $this->render('PetroImageGalleryBundle:Default:about.html.twig');
    }
}
