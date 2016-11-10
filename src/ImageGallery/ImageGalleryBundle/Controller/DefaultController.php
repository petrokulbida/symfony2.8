<?php

namespace ImageGallery\ImageGalleryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $images = $this->getDoctrine()->getManager()->getRepository('PetroImageGalleryBundle:Gallery')->getAlbumsWithImagesLimit10();
        $gallery = $this->getDoctrine()->getManager()->getRepository('PetroImageGalleryBundle:Gallery')->getAlbums();

        $serializer = $this->get('serializer');
        $json = $serializer->serialize(
            $images,
            'json', array('groups' => array('group1'))
        );

        return $this->render('PetroImageGalleryBundle:Default:index.html.twig', array(
            'gallery' => $gallery,
            'images' => $images,
            'json' => $json,
        ));
    }

    public function aboutAction()
    {
        return $this->render('PetroImageGalleryBundle:Default:about.html.twig');
    }
}
