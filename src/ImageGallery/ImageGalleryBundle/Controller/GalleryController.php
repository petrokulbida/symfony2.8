<?php

namespace ImageGallery\ImageGalleryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GalleryController extends Controller
{
    /**
     * Show a gallery entry
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $album = $em->getRepository('PetroImageGalleryBundle:Gallery')->find($id);

        if (!$album) {
            throw $this->createNotFoundException('Unable to find album.');
        }

        return $this->render('PetroImageGalleryBundle:Gallery:show.html.twig', array(
            'album' => $album,
        ));
    }
}
