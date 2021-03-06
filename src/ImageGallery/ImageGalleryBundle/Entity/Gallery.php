<?php

namespace ImageGallery\ImageGalleryBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="ImageGallery\ImageGalleryBundle\Entity\Repository\GalleryRepository")
 * @ORM\Table(name="gallery")
 * @ORM\HasLifecycleCallbacks
 */
class Gallery
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $albumTitle;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $albumAuthor;

    /**
     * @ORM\Column(type="text")
     */
    protected $albumDesc;

    /**
     * @ORM\Column(type="string", length=20)
     */
    protected $albumImage;

    /**
     * @ORM\OneToMany(targetEntity="Images", mappedBy="parent"))
     */
    protected $images;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $created;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $updated;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->images = new \Doctrine\Common\Collections\ArrayCollection();

        $this->setCreated(new \DateTime());
        $this->setUpdated(new \DateTime());
    }



    /**
     * Set albumTitle
     *
     * @param string $albumTitle
     *
     * @return Gallery
     */
    public function setAlbumTitle($albumTitle)
    {
        $this->albumTitle = $albumTitle;

        return $this;
    }

    /**
     * Get albumTitle
     *
     * @return string
     */
    public function getAlbumTitle()
    {
        return $this->albumTitle;
    }

    /**
     * Set albumAuthor
     *
     * @param string $albumAuthor
     *
     * @return Gallery
     */
    public function setAlbumAuthor($albumAuthor)
    {
        $this->albumAuthor = $albumAuthor;

        return $this;
    }

    /**
     * Get albumAuthor
     *
     * @return string
     */
    public function getAlbumAuthor()
    {
        return $this->albumAuthor;
    }

    /**
     * Set albumDesc
     *
     * @param string $albumDesc
     *
     * @return Gallery
     */
    public function setAlbumDesc($albumDesc)
    {
        $this->albumDesc = $albumDesc;

        return $this;
    }

    /**
     * Get albumDesc
     *
     * @return string
     */
    public function getAlbumDesc()
    {
        return $this->albumDesc;
    }

    /**
     * Set albumImage
     *
     * @param string $albumImage
     *
     * @return Gallery
     */
    public function setAlbumImage($albumImage)
    {
        $this->albumImage = $albumImage;

        return $this;
    }

    /**
     * Get albumImage
     *
     * @return string
     */
    public function getAlbumImage()
    {
        return $this->albumImage;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Gallery
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     *
     * @return Gallery
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Add image
     *
     * @param \ImageGallery\ImageGalleryBundle\Entity\Images $image
     *
     * @return Gallery
     */
    public function addImage(\ImageGallery\ImageGalleryBundle\Entity\Images $image)
    {
        $this->images[] = $image;

        return $this;
    }

    /**
     * Remove image
     *
     * @param \ImageGallery\ImageGalleryBundle\Entity\Images $image
     */
    public function removeImage(\ImageGallery\ImageGalleryBundle\Entity\Images $image)
    {
        $this->images->removeElement($image);
    }

    /**
     * Get images
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImages()
    {
        return $this->images;
    }
}
