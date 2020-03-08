# controller
[![Latest Stable Version](https://poser.pugx.org/delboy1978uk/bone-controller/v/stable)](https://packagist.org/packages/delboy1978uk/bone-controller) [![Total Downloads](https://poser.pugx.org/delboy1978uk/bone/downloads)](https://packagist.org/packages/delboy1978uk/bone) [![Latest Unstable Version](https://poser.pugx.org/delboy1978uk/bone-controller/v/unstable)](https://packagist.org/packages/delboy1978uk/bone-controller) [![License](https://poser.pugx.org/delboy1978uk/bone-controller/license)](https://packagist.org/packages/delboy1978uk/bone-controller)<br />
[![Build Status](https://travis-ci.org/delboy1978uk/bone-controller.png?branch=master)](https://travis-ci.org/delboy1978uk/bone-controller) [![Code Coverage](https://scrutinizer-ci.com/g/delboy1978uk/bone-controller/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/delboy1978uk/bone-controller/?branch=master) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/delboy1978uk/bone-controller/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/delboy1978uk/bone-controller/?branch=master)<br />

Controller package for Bone Mvc Framework
## installation
Use Composer
```
composer require delboy1978uk/bone-controller
```
## usage
Simply add to the `config/packages.php`
```php
<?php

// use statements here
use Bone\Controller\ControllerPackage;

return [
    'packages' => [
        // packages here...,
        ControllerPackage::class,
    ],
    // ...
];
```