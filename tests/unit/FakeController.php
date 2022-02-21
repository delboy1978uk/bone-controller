<?php

namespace Bone\Test\Controller;

use Bone\BoneDoctrine\EntityManagerAwareInterface;
use Bone\BoneDoctrine\HasEntityManagerTrait;
use Bone\Controller\Controller;
use Bone\Db\DbProviderInterface;
use Bone\Db\HasDbTrait;
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

class FakeController extends Controller implements I18nAwareInterface, ViewAwareInterface, SiteConfigAwareInterface, SessionAwareInterface, LoggerAwareInterface, DbProviderInterface, EntityManagerAwareInterface
{
    use HasDbTrait;
    use HasEntityManagerTrait;
    use HasLoggerTrait;
    use HasTranslatorTrait;
    use HasSiteConfigTrait;
    use HasSessionTrait;
    use HasViewTrait;

    public function getChannel(): string
    {
        return 'default';
    }
}
