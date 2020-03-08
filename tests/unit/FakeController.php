<?php

namespace BoneTest;

use Bone\Controller\Controller;
use Bone\I18n\I18nAwareInterface;
use Bone\Log\LoggerAwareInterface;
use Bone\Server\SessionAwareInterface;
use Bone\Server\SiteConfig;
use Bone\Server\SiteConfigAwareInterface;
use Bone\Traits\HasLoggerTrait;
use Bone\Traits\HasSessionTrait;
use Bone\Traits\HasSiteConfigTrait;
use Bone\Traits\HasTranslatorTrait;
use Bone\Traits\HasViewTrait;
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
