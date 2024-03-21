<?php

namespace Bone\Test\Controller;

use Barnacle\Container;
use Bone\Controller\ControllerException;
use Bone\Controller\DownloadController;
use Bone\Controller\Init;
use Bone\Server\SiteConfig;
use Bone\View\ViewEngine;
use Bone\View\ViewEngineInterface;
use Bone\Test\Controller\FakeController;
use Codeception\Test\Unit;
use Del\SessionManager;
use Doctrine\ORM\EntityManager;
use InvalidArgumentException;
use Laminas\Diactoros\ServerRequest;
use Laminas\Diactoros\Uri;
use Laminas\I18n\Translator\Translator;
use PDO;
use Psr\Log\LoggerInterface;

class ControllerInitTest extends Unit
{
    public function testConstructorhrowsException()
    {
        $container = new Container();
        $container[Translator::class] = $this->makeEmpty(Translator::class);
        $container[ViewEngine::class] = $this->makeEmpty(ViewEngine::class);
        $container[SiteConfig::class] = $this->makeEmpty(SiteConfig::class);
        $container[PDO::class] = $this->makeEmpty(PDO::class);
        $container[EntityManager::class] = $this->makeEmpty(EntityManager::class);
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
        $this->assertInstanceOf(PDO::class, $controller->getDb());
        $this->assertInstanceOf(EntityManager::class, $controller->getEntityManager());
    }
}


