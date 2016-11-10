<?php

namespace ImageGallery\ImageGalleryBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ImageGallery\ImageGalleryBundle\Entity\Gallery;

class GalleryFixtures extends AbstractFixture implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for($i=0;$i<5;$i++) {
            $album = new Gallery();
            $album->setAlbumTitle('Petro album'.$i);
            $album->setAlbumDesc('Lorem ipsum dolor sit amet, consectetur adipiscing eletra electrify denim vel ports.\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ut velocity magna. Etiam vehicula nunc non leo hendrerit commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras el mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras elementum molestie vestibulum. Morbi id quam nisl. Praesent hendrerit, orci sed elementum lobortis, justo mauris lacinia libero, non facilisis purus ipsum non mi. Aliquam sollicitudin, augue id vestibulum iaculis, sem lectus convallis nunc, vel scelerisque lorem tortor ac nunc. Donec pharetra eleifend enim vel porta.');
            $album->setAlbumImage('beach.jpg');
            $album->setAlbumAuthor('Petro');
            $manager->persist($album);
            $this->addReference('album-'.$i, $album);
        }
        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }

}