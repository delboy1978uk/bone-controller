# bone-controller
[![Latest Stable Version](https://poser.pugx.org/delboy1978uk/bone-controller/v/stable)](https://packagist.org/packages/delboy1978uk/bone-controller) [![Total Downloads](https://poser.pugx.org/delboy1978uk/bone/downloads)](https://packagist.org/packages/delboy1978uk/bone) [![Latest Unstable Version](https://poser.pugx.org/delboy1978uk/bone-controller/v/unstable)](https://packagist.org/packages/delboy1978uk/bone-controller) [![License](https://poser.pugx.org/delboy1978uk/bone-controller/license)](https://packagist.org/packages/delboy1978uk/bone-controller)<br />
[![Build Status](https://travis-ci.org/delboy1978uk/bone-controller.png?branch=master)](https://travis-ci.org/delboy1978uk/bone-controller) [![Code Coverage](https://scrutinizer-ci.com/g/delboy1978uk/bone-controller/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/delboy1978uk/bone-controller/?branch=master) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/delboy1978uk/bone-controller/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/delboy1978uk/bone-controller/?branch=master)<br />

Controller package for Bone Mvc Framework
## installation
bone-controller is part of the core functionality of `delboy1978uk/bone`, and as such will already be installed in your
app.
## usage
The `Bone\Controller\Controller` comes with a view engine, translator, and site config info. Just extend it in your own
class to get these features, and in your package registration class, pass it through `Bone\Controller\Init`:
```php
$controller = new YourController();

return Init::controller($controller, $c); // where $c is the container
```