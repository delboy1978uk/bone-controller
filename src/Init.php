<?php

namespace Bone\Controller;

use Barnacle\Container;
use Bone\I18n\I18nAwareInterface;
use Bone\Controller\Controller;
use Bone\View\ViewEngine;
use Bone\Log\LoggerAwareInterface;
use Bone\Server\SessionAwareInterface;
use Bone\Server\SiteConfig;
use Bone\Server\SiteConfigAwareInterface;
use Bone\View\ViewAwareInterface;
use Del\SessionManager;
use Laminas\I18n\Translator\Translator;
use Psr\Log\LoggerInterface;

class Init
{
    /**
     * @param Controller $controller
     * @param Container $container
     * @return Controller
     */
    public static function controller(Controller $controller, Container $container): Controller
    {
        if ($controller instanceof I18nAwareInterface) {
            $controller->setTranslator($container->get(Translator::class));
        }

        if ($controller instanceof ViewAwareInterface) {
            $controller->setView($container->get(ViewEngine::class));
        }

        if ($controller instanceof SiteConfigAwareInterface) {
            $controller->setSiteConfig($container->get(SiteConfig::class));
        }

        if ($controller instanceof SessionAwareInterface) {
            $controller->setSession($container->get(SessionManager::class));
        }

        if ($controller instanceof LoggerAwareInterface) {
            $channel = $controller->getChannel();
            $loggers = $container->get(LoggerInterface::class);
            $logger = in_array($channel, $loggers) ? $loggers['channel'] : $loggers['default'];
            $controller->setLogger($logger);
        }

        return $controller;
    }
}