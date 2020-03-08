<?php

namespace Barnacle\Tests;

use Barnacle\Container;
use Bone\Controller\ControllerException;
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

    public function testDownloadControllerThrowsException()
    {
        $this->expectException(ControllerException::class);
        $controller = new DownloadController('tests/_data');
        $request = new ServerRequest();
        $request = $request->withQueryParams(['file' => 'tests/_data/logo.png']);
        $response = $controller->downloadAction($request, []);
    }

    public function testDownloadController()
    {
        $controller = new DownloadController('tests/_data');
        $request = new ServerRequest();
        $request = $request->withQueryParams(['file' => '/logo.png']);
        $response = $controller->downloadAction($request, []);
        $this->assertEquals('image/png', $response->getHeader('Content-Type')[0]);
    }
}


