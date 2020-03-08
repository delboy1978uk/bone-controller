<?php

namespace Barnacle\Tests;

use Barnacle\Container;
use Bone\Controller\DownloadController;
use Codeception\TestCase\Test;
use Laminas\Diactoros\ServerRequest;
use Laminas\Diactoros\Uri;

class ControllerTest extends Test
{
    /** @var Container */
    protected $container;

    protected function _before()
    {
        $this->container = $c = new Container();
    }

    protected function _after()
    {
        unset($this->container);
    }

    public function testDownloadController()
    {
        $controller = new DownloadController('tests/_data');
        $request = new ServerRequest(new Uri('/download?file=logo.png'));
        $response = $controller->downloadAction($request);
        $this->assertEquals('image/png', $response->getHeader('Content-Type'));
    }
}


