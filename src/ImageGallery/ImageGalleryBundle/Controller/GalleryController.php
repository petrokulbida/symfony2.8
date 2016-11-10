<?php

namespace ImageGallery\ImageGalleryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class GalleryController extends Controller
{
    /**
     * Show a gallery entry
     */
    public function showAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $album = $em->getRepository('PetroImageGalleryBundle:Gallery')->find($id);

        if (!$album) {
            throw $this->createNotFoundException('Unable to find album.');
        }

        $imagesQuery = $em->getRepository('PetroImageGalleryBundle:Images')->getImagesForAlbum($album->getId());

        $paginator  = $this->get('knp_paginator');

        $pagination = $paginator->paginate(
            $imagesQuery,
            $request->query->getInt('page', 1),
            10
        );

        $serializer = $this->get('serializer');
        $json = $serializer->serialize(
            $pagination,
            'json', array('groups' => array('group1'))
        );

        return $this->render('PetroImageGalleryBundle:Gallery:show.html.twig', array(
            'album' => $album,
            'pagination' => $pagination
        ));
    }
}
