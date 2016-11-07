<?php

namespace ImageGallery\ImageGalleryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $gallery = $em->createQueryBuilder()
            ->select('g')
            ->from('PetroImageGalleryBundle:Gallery', 'g')
            ->addOrderBy('g.created', 'DESC')
            ->getQuery()
            ->getResult();

        return $this->render('PetroImageGalleryBundle:Default:index.html.twig', array(
            'gallery' => $gallery
        ));
    }

    public function aboutAction()
    {
        return $this->render('PetroImageGalleryBundle:Default:about.html.twig');
    }
}
