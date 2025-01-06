# bone-controller
[![Latest Stable Version](https://poser.pugx.org/delboy1978uk/bone-controller/v/stable)](https://packagist.org/packages/delboy1978uk/bone-controller) [![Total Downloads](https://poser.pugx.org/delboy1978uk/bone/downloads)](https://packagist.org/packages/delboy1978uk/bone) [![Latest Unstable Version](https://poser.pugx.org/delboy1978uk/bone-controller/v/unstable)](https://packagist.org/packages/delboy1978uk/bone-controller) [![License](https://poser.pugx.org/delboy1978uk/bone-controller/license)](https://packagist.org/packages/delboy1978uk/bone-controller)<br />
![build status](https://github.com/delboy1978uk/bone-controller/actions/workflows/master.yml/badge.svg) [![Code Coverage](https://scrutinizer-ci.com/g/delboy1978uk/bone-controller/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/delboy1978uk/bone-controller/?branch=master) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/delboy1978uk/bone-controller/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/delboy1978uk/bone-controller/?branch=master)<br />

Controller package for Bone Framework
## installation
bone-controller is part of the core functionality of `delboy1978uk/bone`, and as such will already be installed in your
app.
## usage
The `Bone\Controller\Controller` comes with a serializer, view engine, translator, and site config info. Just extend it in your own
class to get these features, and in your package registration class, pass it through `Bone\Controller\Init`:
```php
$controller = new YourController();

return Init::controller($controller, $c); // where $c is the container
```
The `Init` class is a convenience class which checks for the following, and populates from the DI container.

| Feature        | Interface                                            | Trait                                          |
|----------------|------------------------------------------------------|------------------------------------------------|
| Entity Manager | Bone\BoneDoctrine\Traits\EntityManagerAwareInterface | Bone\BoneDoctrine\Traits\HasEntityManagerTrait |
| i18n           | Bone\I18n\I18nAwareInterface                         | Bone\I18n\Traits\HasTranslatorTrait            |
| Logger         | Bone\Log\Traits\HasLoggerTrait                       | Bone\Log\Traits\HasLoggerTrait                 |
| PDO Connection | Bone\Db\DbProviderInterface                          | Bone\Db\HasDbTrait                             |
| Serializer     | Bone\Controller\SerializerAwareInterface             | Bone\Controller\Traits\HasSerializer           |
| Session        | Bone\Server\SessionAwareInterface                    | Bone\Server\Traits\HasSessionTrait             |
| Site Config    | Bone\Server\SiteConfigAwareInterface                 | Bone\Server\Traits\HasSiteConfigTrait          |
| View           | Bone\View\ViewAwareInterface                         | Bone\View\Traits\HasViewTrait                  |

In your own controller, implement the Interface and use the Trait:
```php
use Bone\BoneDoctrine\EntityManagerAwareInterface;
use Bone\BoneDoctrine\Traits\HasEntityManagerTrait;

class MyController implements EntityManagerAwareInterface
{
    use HasEntityManagerTrait;
}
```
