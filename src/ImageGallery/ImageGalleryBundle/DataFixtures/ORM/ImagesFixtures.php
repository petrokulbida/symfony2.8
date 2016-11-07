<?php

namespace ImageGallery\ImageGalleryBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ImageGallery\ImageGalleryBundle\Entity\Gallery;
use ImageGallery\ImageGalleryBundle\Entity\Images;

class ImagesFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for($i=0;$i<5;$i++) {
            $comment = new Images();
            $comment->setImage('beach.jpg');
            $comment->setParent($manager->merge($this->getReference('album-0')));
            $manager->persist($comment);
        }

        for($i=1;$i<5;$i++) {
            $imagesCount = 20 + mt_rand(0, 10);
            while($imagesCount > 0) {
                $comment = new Images();
                $comment->setImage('beach.jpg');
                $comment->setParent($manager->merge($this->getReference('album-' . $i)));
                $manager->persist($comment);
                $imagesCount--;
            }
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}