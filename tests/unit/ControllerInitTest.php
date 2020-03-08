<?php

namespace Barnacle\Tests;

use Barnacle\Container;
use Bone\Controller\ControllerException;
use Bone\Controller\DownloadController;
use Bone\Controller\Init;
use Bone\Server\SiteConfig;
use Bone\View\ViewEngine;
use Bone\View\ViewEngineInterface;
use BoneTest\FakeController;
use Codeception\TestCase\Test;
use Del\SessionManager;
use InvalidArgumentException;
use Laminas\Diactoros\ServerRequest;
use Laminas\Diactoros\Uri;
use Laminas\I18n\Translator\Translator;
use Psr\Log\LoggerInterface;

class ControllerInitTest extends Test
{
    public function testConstructorhrowsException()
    {
        $container = new Container();
        $container[Translator::class] = $this->getMockBuilder(Translator::class)->getMock();
        $container[ViewEngine::class] = $this->getMockBuilder(ViewEngine::class)->getMock();
        $container[SiteConfig::class] = $this->getMockBuilder(SiteConfig::class)->disableOriginalConstructor()->getMock();
        $container[SessionManager::class] = SessionManager::getInstance();
        $container[LoggerInterface::class] = [
            'default' => $this->getMockBuilder(LoggerInterface::class)->getMock()
        ];

        $controller = new FakeController();
        $controller = Init::controller($controller, $container);
        $this->assertInstanceOf(Translator::class, $controller->getTranslator());
        $this->assertInstanceOf(ViewEngine::class, $controller->getView());
        $this->assertInstanceOf(SiteConfig::class, $controller->getSiteConfig());
        $this->assertInstanceOf(SessionManager::class, $controller->getSession());
        $this->assertInstanceOf(LoggerInterface::class, $controller->getLogger());
    }
}


