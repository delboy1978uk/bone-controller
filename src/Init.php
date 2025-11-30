<?php

namespace Bone\Controller;

use Barnacle\Container;
use Bone\Db\DbProviderInterface;
use Bone\I18n\I18nAwareInterface;
use Bone\Log\LoggerAwareInterface;
use Bone\Server\SessionAwareInterface;
use Bone\Server\SiteConfig;
use Bone\Server\SiteConfigAwareInterface;
use Bone\View\ViewAwareInterface;
use Bone\View\ViewEngineInterface;
use Del\SessionManager;
use Doctrine\ORM\EntityManager;
use JMS\Serializer\SerializerBuilder;
use Laminas\I18n\Translator\Translator;
use PDO;
use Psr\Log\LoggerInterface;

class Init
{
    public static function controller(Controller $controller, Container $container): Controller
    {
        self::i18nCheck($controller, $container);
        self::viewCheck($controller, $container);
        self::pdoCheck($controller, $container);
        self::entityManagerCheck($controller, $container);
        self::siteConfigCheck($controller, $container);
        self::serializerCheck($controller, $container);
        self::sessionCheck($controller, $container);
        self::loggerCheck($controller, $container);

        return $controller;
    }

    private static function pdoCheck(Controller $controller, Container $container): void
    {
        if ($controller instanceof DbProviderInterface) {
            $controller->setDb($container->get(PDO::class));
        }
    }

    private static function entityManagerCheck(Controller $controller, Container $container): void
    {
        if (in_array('Bone\BoneDoctrine\EntityManagerAwareInterface', class_implements($controller))) {
            $controller->setEntityManager($container->get(EntityManager::class));
        }
    }

    private static function i18nCheck(Controller $controller, Container $container): void
    {
        if ($controller instanceof I18nAwareInterface) {
            $controller->setTranslator($container->get(Translator::class));
        }
    }

    private static function viewCheck(Controller $controller, Container $container): void
    {
        if ($controller instanceof ViewAwareInterface) {
            $controller->setView($container->get(ViewEngineInterface::class));
        }
    }

    private static function serializerCheck(Controller $controller, Container $container): void
    {
        if ($controller instanceof SerializerAwareInterface) {
            $serializer = SerializerBuilder::create()->build();
            $controller->setSerializer($serializer);
        }
    }

    private static function siteConfigCheck(Controller $controller, Container $container): void
    {
        if ($controller instanceof SiteConfigAwareInterface) {
            $controller->setSiteConfig($container->get(SiteConfig::class));
        }
    }

    private static function sessionCheck(Controller $controller, Container $container): void
    {
        if ($controller instanceof SessionAwareInterface) {
            $controller->setSession($container->get(SessionManager::class));
        }
    }

    private static function loggerCheck(Controller $controller, Container $container): void
    {
        if ($controller instanceof LoggerAwareInterface) {
            $channel = $controller->getChannel();
            $loggers = $container->get(LoggerInterface::class);
            $logger = in_array($channel, $loggers) ? $loggers['channel'] : $loggers['default'];
            $controller->setLogger($logger);
        }
    }
}
