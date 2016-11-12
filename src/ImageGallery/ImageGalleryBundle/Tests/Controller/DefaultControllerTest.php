<?php

namespace ImageGallery\ImageGalleryBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use ImageGallery\ImageGalleryBundle\Controller\DefaultController;

class DefaultControllerTest extends \PHPUnit_Framework_TestCase
{
    public function testIndexAction()
    {
        $templating = $this->getMock('Symfony\Bundle\FrameworkBundle\Templating\Engine');
        $templating->expects($this->once())
            ->method('render')
            ->with('Application:Index:index')
            ->will($this->returnValue('success'))
        ;

        $controller = new DefaultController();
        $controller->setContainer($templating);

        $this->assertEquals('success', $controller->indexAction());
    }
}
