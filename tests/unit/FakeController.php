<?php

namespace BoneTest;

use Bone\Controller\Controller;
use Bone\I18n\I18nAwareInterface;
use Bone\Log\LoggerAwareInterface;
use Bone\Server\SessionAwareInterface;
use Bone\Server\SiteConfig;
use Bone\Server\SiteConfigAwareInterface;
use Bone\Log\Traits\HasLoggerTrait;
use Bone\Server\Traits\HasSessionTrait;
use Bone\Server\Traits\HasSiteConfigTrait;
use Bone\I18n\Traits\HasTranslatorTrait;
use Bone\View\Traits\HasViewTrait;
use Bone\View\ViewAwareInterface;

class FakeController extends Controller implements I18nAwareInterface, ViewAwareInterface, SiteConfigAwareInterface, SessionAwareInterface, LoggerAwareInterface
{
    use HasTranslatorTrait;
    use HasViewTrait;
    use HasSiteConfigTrait;
    use HasSessionTrait;
    use HasLoggerTrait;

    public function getChannel(): string
    {
        return 'default';
    }
}
