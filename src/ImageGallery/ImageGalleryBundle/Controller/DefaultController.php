<?php

namespace ImageGallery\ImageGalleryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $gallery = $this->getDoctrine()->getManager()->getRepository('PetroImageGalleryBundle:Gallery')->getAlbums();

        return $this->render('PetroImageGalleryBundle:Default:index.html.twig', array(
            'gallery' => $gallery
        ));
    }

    public function aboutAction()
    {
        return $this->render('PetroImageGalleryBundle:Default:about.html.twig');
    }
}
