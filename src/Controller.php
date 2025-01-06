<?php

namespace Bone\Controller;

use Bone\Controller\Traits\HasSerializer;
use Bone\I18n\I18nAwareInterface;
use Bone\Server\Traits\HasSiteConfigTrait;
use Bone\I18n\Traits\HasTranslatorTrait;
use Bone\View\Traits\HasViewTrait;
use Bone\View\ViewAwareInterface;
use Bone\Server\SiteConfigAwareInterface;
use Psr\Http\Message\ResponseInterface;

class Controller implements I18nAwareInterface, ViewAwareInterface, SiteConfigAwareInterface, SerializerAwareInterface
{
    use HasSerializer;
    use HasSiteConfigTrait;
    use HasTranslatorTrait;
    use HasViewTrait;

    public function responseWithLayout(ResponseInterface $response, string $layout): ResponseInterface
    {
        return $response->withHeader('layout', $layout);
    }
}
