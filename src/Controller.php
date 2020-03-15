<?php

namespace Bone\Controller;

use Bone\I18n\I18nAwareInterface;
use Bone\Server\Traits\HasSiteConfigTrait;
use Bone\I18n\Traits\HasTranslatorTrait;
use Bone\View\Traits\HasViewTrait;
use Bone\View\ViewAwareInterface;
use Bone\Server\SiteConfigAwareInterface;

class Controller implements I18nAwareInterface, ViewAwareInterface, SiteConfigAwareInterface
{
    use HasSiteConfigTrait;
    use HasTranslatorTrait;
    use HasViewTrait;
}
