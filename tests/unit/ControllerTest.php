<?php

namespace Barnacle\Tests;

use Barnacle\Container;
use Bone\Controller\ControllerException;
use Bone\Controller\DownloadController;
use Codeception\TestCase\Test;
use InvalidArgumentException;
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

    public function testConstructorhrowsException()
    {
        $this->expectException(InvalidArgumentException::class);
        $controller = new DownloadController('thiswillfail');
    }

    public function testDownloadControllerThrowsException()
    {
        $this->expectException(ControllerException::class);
        $controller = new DownloadController('tests/_data');
        $request = new ServerRequest();
        $request = $request->withQueryParams(['file' => 'tests/_data/logo.png']);
        $response = $controller->downloadAction($request, []);
    }

    public function testDownloadControllerThrows400()
    {
        $this->expectException(ControllerException::class);
        $controller = new DownloadController('tests/_data');
        $request = new ServerRequest();
        $response = $controller->downloadAction($request, []);
    }

    public function testDownloadController()
    {
        $controller = new DownloadController('tests/_data');
        $request = new ServerRequest();
        $request = $request->withQueryParams(['file' => '/logo.png']);
        $response = $controller->downloadAction($request, []);
        $this->assertEquals('image/png; charset=binary', $response->getHeader('Content-Type')[0]);
    }

    public function testPublicDownloadController()
    {
        $delete = false;
        if (!is_dir('public')) {
            $delete = true;
            mkdir('public');
        }
        copy('tests/_data/logo.png', 'public/logo.png');
        $controller = new DownloadController('tests/_data');
        $request = new ServerRequest();
        $request = $request->withQueryParams(['file' => '/logo.png']);
        $response = $controller->downloadAction($request, []);
        $this->assertEquals('image/png; charset=binary', $response->getHeader('Content-Type')[0]);
        unlink('public/logo.png');
        if ($delete) {
            rmdir('public');
        }
    }
}


