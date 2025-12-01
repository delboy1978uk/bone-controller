<?php

namespace Bone\Test\Controller;

use Barnacle\Container;
use Bone\Controller\Init;
use Bone\Server\SiteConfig;
use Bone\View\ViewEngine;
use Bone\View\ViewEngineInterface;
use Codeception\Test\Unit;
use Del\SessionManager;
use Doctrine\ORM\EntityManagerInterface;
use Laminas\I18n\Translator\Translator;
use PDO;
use Psr\Log\LoggerInterface;

class ControllerInitTest extends Unit
{
    public function testConstructorhrowsException()
    {
        $container = new Container();
        $container[Translator::class] = $this->makeEmpty(Translator::class);
        $container[ViewEngineInterface::class] = $this->makeEmpty(ViewEngineInterface::class);
        $container[SiteConfig::class] = $this->makeEmpty(SiteConfig::class);
        $container[PDO::class] = $this->makeEmpty(PDO::class);
        $container[EntityManagerInterface::class] = $this->makeEmpty(EntityManagerInterface::class);
        $container[SessionManager::class] = SessionManager::getInstance();
        $container[LoggerInterface::class] = [
            'default' => $this->getMockBuilder(LoggerInterface::class)->getMock()
        ];

        $controller = new FakeController();
        $controller = Init::controller($controller, $container);
        $this->assertInstanceOf(Translator::class, $controller->getTranslator());
        $this->assertInstanceOf(ViewEngineInterface::class, $controller->getView());
        $this->assertInstanceOf(SiteConfig::class, $controller->getSiteConfig());
        $this->assertInstanceOf(SessionManager::class, $controller->getSession());
        $this->assertInstanceOf(LoggerInterface::class, $controller->getLogger());
        $this->assertInstanceOf(PDO::class, $controller->getDb());
        $this->assertInstanceOf(EntityManagerInterface::class, $controller->getEntityManager());
    }
}


